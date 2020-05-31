<?php
/*
* Plugin Name: Simple Google reCAPTCHA
* Description: Simply protect your WordPress against spam comments and brute-force attacks, thanks to Google reCAPTCHA!
* Version: 3.4
* Author: Michal Novák
* Author URI: https://www.novami.cz
* License: GPL3
* Text Domain: simple-google-recaptcha
*/

if (!defined('ABSPATH')) {
    die('Direct access not allowed!');
}


/**
 * Class SimpleGoogleRecaptcha
 */
class SimpleGoogleRecaptcha
{
    const TEXT_DOMAIN = 'simple-google-recaptcha';
    const V2 = 'v2 "I\'m not a robot" Checkbox';
    const V3 = 'v3';

    private $pluginName;
    private $version;
    private $loginDisable;
    private $badgeHide;
    private $siteKey;
    private $secretKey;

    private $recaptchaResponse;

    /**
     * SimpleGoogleRecaptcha constructor.
     */
    public function __construct()
    {
        $this->pluginName = get_file_data(__FILE__, ['Name' => 'Plugin Name'])['Name'];
        $this->version = (int)filter_var(get_option('sgr_version'), FILTER_SANITIZE_NUMBER_INT);
        $this->loginDisable = (int)filter_var(get_option('sgr_login_disable'), FILTER_SANITIZE_NUMBER_INT);
        $this->badgeHide = (int)filter_var(get_option('sgr_badge_hide'), FILTER_SANITIZE_NUMBER_INT);
        $this->siteKey = filter_var(get_option('sgr_site_key'), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $this->secretKey = filter_var(get_option('sgr_secret_key'), FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        add_filter(sprintf('plugin_action_links_%s', plugin_basename(__FILE__)), [$this, 'action_links']);

        add_action('activated_plugin', [$this, 'activation']);
        add_action('admin_menu', [$this, 'menu']);
        add_action('admin_init', [$this, 'display_options']);
        add_action('wp_loaded', [$this, 'check']);
    }

    /**
     * @param $links
     * @return array
     */
    public function action_links($links)
    {
        return array_merge(['settings' => sprintf('<a href="options-general.php?page=sgr_options">%s</a>', __('Settings', self::TEXT_DOMAIN))], $links);
    }

    public function activation($plugin)
    {
        if ($plugin == plugin_basename(__FILE__) && (!$this->siteKey || !$this->secretKey)) {
            exit(wp_redirect(admin_url('options-general.php?page=sgr_options')));
        }
    }

    public function options_page()
    {
        echo sprintf('<div class="wrap"><h1>%s - %s</h1><form method="post" action="options.php">', $this->pluginName, __('Settings', self::TEXT_DOMAIN));

        settings_fields('sgr_header_section');
        do_settings_sections('sgr_options');

        submit_button();

        echo sprintf('</form>%s</div>', $this->messageProtectionStatus());
    }

    public function menu()
    {
        $this->enqueue_main();
        add_submenu_page('options-general.php', $this->pluginName, 'Google reCAPTCHA', 'manage_options', 'sgr_options', [$this, 'options_page']);
    }

    public function display_sgr_site_key()
    {
        echo sprintf('<input type="text" name="sgr_site_key" class="regular-text" id="sgr_site_key" value="%s" />', $this->siteKey);
    }

    public function display_sgr_secret_key()
    {
        echo sprintf('<input type="text" name="sgr_secret_key" class="regular-text" id="sgr_secret_key" value="%s" />', $this->secretKey);
    }

    public function display_sgr_login_disable()
    {
        echo sprintf('<input type="checkbox" name="sgr_login_disable" id="sgr_login_disable" value="1" %s />', checked(1, $this->loginDisable, false));
    }

    public function display_sgr_version()
    {
        echo sprintf('<input type="checkbox" name="sgr_version" id="sgr_version" value="3" %s />', checked(3, $this->version, false));
    }

    public function display_sgr_badge_hide()
    {
        echo sprintf('<input type="checkbox" name="sgr_badge_hide" id="sgr_badge_hide" value="1" %s />', checked(1, $this->badgeHide, false));
    }

    public function display_options()
    {
        $fields = [
            ['id' => 'sgr_site_key', 'label' => __('Site Key', self::TEXT_DOMAIN)],
            ['id' => 'sgr_secret_key', 'label' => __('Secret Key', self::TEXT_DOMAIN)],
            ['id' => 'sgr_login_disable', 'label' => __('Disable on login form', self::TEXT_DOMAIN)],
            ['id' => 'sgr_version', 'label' => __('Enable reCAPTCHA v3', self::TEXT_DOMAIN)],
            ['id' => 'sgr_badge_hide', 'label' => __('Hide reCAPTCHA v3 badge', self::TEXT_DOMAIN)],
        ];

        add_settings_section('sgr_header_section', __('Google reCAPTCHA keys', self::TEXT_DOMAIN), [], 'sgr_options');

        foreach ($fields as $field) {
            add_settings_field($field['id'], $field['label'], [$this, sprintf('display_%s', $field['id'])], 'sgr_options', 'sgr_header_section');
            register_setting('sgr_header_section', $field['id']);
        }
    }

    public function enqueue_main()
    {
        $jsName = 'sgr.js';
        $jsPath = sprintf('%s%s', plugin_dir_path(__FILE__), $jsName);
        $jsVersion = filemtime($jsPath);

        wp_enqueue_script('sgr_recaptcha_main', sprintf('%s%s', plugin_dir_url(__FILE__), $jsName), [], $jsVersion);
        wp_localize_script('sgr_recaptcha_main', 'sgr_recaptcha', ['site_key' => $this->siteKey]);
    }

    public function enqueue_scripts()
    {
        $apiUrlBase = sprintf('https://www.recaptcha.net/recaptcha/api.js?hl=%s', get_locale());
        $jsUrl = sprintf('%s&onload=sgr_2&render=explicit', $apiUrlBase);

        if ($this->version === 3) {
            $jsUrl = sprintf('%s&render=%s&onload=sgr_3', $apiUrlBase, $this->siteKey);
        }

        wp_enqueue_script('sgr_recaptcha', $jsUrl);
    }

    public function frontend()
    {
        $this->enqueue_main();

        $sgr_display_list = [
            'comment_form_after_fields',
            'register_form',
            'lostpassword_form',
            'woocommerce_register_form',
            'woocommerce_lostpassword_form',
            'woocommerce_after_order_notes',
            'bp_after_signup_profile_fields',
        ];

        $sgr_verify_list = [
            'preprocess_comment',
            'registration_errors',
            'lostpassword_post',
            'woocommerce_register_post',
            'bp_signup_validate'
        ];

        if (!$this->loginDisable) {
            array_push($sgr_display_list, 'login_form', 'woocommerce_login_form');
            array_push($sgr_verify_list, 'wp_authenticate_user');
        }

        $sgrDisplay = $this->version === 3 ? 'v3_display' : 'v2_display';

        foreach ($sgr_display_list as $sgr_display) {
            add_action($sgr_display, [$this, 'enqueue_scripts']);
            add_action($sgr_display, [$this, $sgrDisplay]);
        }

        foreach ($sgr_verify_list as $sgr_verify) {
            add_action($sgr_verify, [$this, 'verify']);
        }
    }

    public function v2_display()
    {
        $cssName = 'sgr.css';
        $cssPath = sprintf('%s%s', plugin_dir_path(__FILE__), $cssName);
        $cssVersion = filemtime($cssPath);

        wp_enqueue_style('style', sprintf('%s%s', plugin_dir_url(__FILE__), $cssName), [], $cssVersion);

        echo '<div class="sgr-recaptcha"></div>';
    }

    public function v3_display()
    {
        $badgeText = null;

        if ($this->badgeHide) {
            $cssName = 'sgr3_hide.css';
            $cssPath = sprintf('%s%s', plugin_dir_path(__FILE__), $cssName);
            $cssVersion = filemtime($cssPath);

            wp_enqueue_style('style', sprintf('%s%s', plugin_dir_url(__FILE__), $cssName), [], $cssVersion);

            $badgeText = sprintf('%s<p class="sgr-infotext">%s</p>', PHP_EOL, __('This site is protected by reCAPTCHA and the Google <a href="https://policies.google.com/privacy">Privacy Policy</a> and <a href="https://policies.google.com/terms">Terms of Service</a> apply.', self::TEXT_DOMAIN));
        }

        echo sprintf('<input type="hidden" name="g-recaptcha-response" class="sgr-recaptcha">%s', $badgeText);
    }

    public function errorMessage($error_code)
    {
        $error_message = null;

        switch ($error_code) {
            case 'missing-input-secret':
                $error_message = __('The secret parameter is missing.', self::TEXT_DOMAIN);
                break;
            case 'missing-input-response':
                $error_message = __('The response parameter is missing.', self::TEXT_DOMAIN);
                break;
            case 'invalid-input-secret':
                $error_message = __('The secret parameter is invalid or malformed.', self::TEXT_DOMAIN);
                break;
            case 'invalid-input-response':
                $error_message = __('The response parameter is invalid or malformed.', self::TEXT_DOMAIN);
                break;
            case 'bad-request':
                $error_message = __('The request is invalid or malformed.', self::TEXT_DOMAIN);
                break;
            case 'timeout-or-duplicate':
                $error_message = __('The response is no longer valid: either is too old or has been used previously.', self::TEXT_DOMAIN);
                break;
        }

        return $error_message;
    }

    private function recaptchaResponse()
    {
        $recaptchaResponse = filter_input(INPUT_POST, 'g-recaptcha-response', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $response = (array)wp_remote_get(sprintf('https://www.recaptcha.net/recaptcha/api/siteverify?secret=%s&response=%s', $this->secretKey, $recaptchaResponse));

        $this->recaptchaResponse = isset($response['body']) ? json_decode($response['body'], 1) : ['success' => false, 'error-codes' => ['general-fail']];
    }

    /**
     * @param $input
     * @return mixed
     */
    public function verify($input)
    {
        $this->recaptchaResponse();

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['g-recaptcha-response'])) {
            $recaptcha_error_code = isset($this->recaptchaResponse['error-codes'][0]) ? $this->recaptchaResponse['error-codes'][0] : null;
            $error_message = $this->errorMessage($recaptcha_error_code);

            if ((int)$this->recaptchaResponse['success'] === 1) {
                return $input;
            } else {
                wp_die(sprintf('<p><strong>%s</strong> Google reCAPTCHA %s. %s</p>', __('Error:', self::TEXT_DOMAIN), __('verification failed', self::TEXT_DOMAIN), $error_message), 'reCAPTCHA', ['response' => 403, 'back_link' => 1]);
            }
        } else {
            wp_die(sprintf('<p><strong>%s</strong> Google reCAPTCHA %s. %s</p>', __('Error:', self::TEXT_DOMAIN), __('verification failed', self::TEXT_DOMAIN), __('Do you have JavaScript enabled?', self::TEXT_DOMAIN)), 'reCAPTCHA', ['response' => 403, 'back_link' => 1]);
        }
    }

    public function messageProtectionStatus()
    {
        $type = $this->version === 3 ? self::V3 : self::V2;

        if (!$this->siteKey || !$this->secretKey) {
            return sprintf('<div class="notice notice-error"><p><strong>%s</strong> Google reCAPTCHA %s!</p><p>%s</p></div>', __('Warning:', self::TEXT_DOMAIN), __('is disabled', self::TEXT_DOMAIN), __(sprintf('You have to <a href="https://www.google.com/recaptcha/admin" rel="external">register your domain</a>, get required Google reCAPTCHA keys %s and save them bellow.', $type), self::TEXT_DOMAIN));
        } else {
            return sprintf('<div class="notice notice-warning"><p><strong>%s</strong> Google reCAPTCHA %s!</p><p>%s</p></div>', __('Notice:', self::TEXT_DOMAIN), __('is enabled', self::TEXT_DOMAIN), __('Keep on mind, that in case of emergency, you can disable this plugin via FTP access, just rename the plugin folder.', self::TEXT_DOMAIN));
        }
    }

    public function check()
    {
        if (!is_user_logged_in() && !wp_doing_ajax() && !function_exists('wpcf7_contact_form_shortcode') && $this->siteKey && $this->secretKey) {
            $this->frontend();
        }
    }
}

new SimpleGoogleRecaptcha();
