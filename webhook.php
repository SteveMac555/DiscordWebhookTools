<?php
  /**
   * Discord Webhook Integration
   * Author: Steve
   * Usage:
   *     $wh = new DiscordWebhook('537200/YOUR WEBHOOK URL HERE6B73D-np8u4ti5');
   *     $wh->post('Hello', 'Botface');
   *
   * Returns: Output of CURL request.
   */
  class DiscordWebhook {
      private $discordURL = 'https://discordapp.com/api/webhooks/';
      private $webhookURL;

      public function __construct($webhookURL) {
        if (isset($webhookURL)) {
          $this->webhookURL = $webhookURL;
        }
      }

      public function post($message, $username) {
        if (isset($message, $username)) {
            $data = json_encode(Array(
              'content' => $message,
              'username' => $username
            ));

            try {
              $c = curl_init($this->discordURL . $this->webhookURL);
              curl_setopt($c, CURLOPT_CUSTOMREQUEST, 'POST');
              curl_setopt($c, CURLOPT_POSTFIELDS, $data);
              curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
              return curl_exec($c);
            } catch (Exception $e) {
              return 'Exception: ' . $e->getMessage();
            }
        }
      }
  }
 ?>
