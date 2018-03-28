<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Tes extends CI_Controller {
# Try running this locally.
# Include the Autoloader (see "Libraries" for install instructions)
require 'vendor/autoload.php';
use Mailgun\Mailgun;

# Instantiate the client.
$mgClient = new Mailgun('key-f51bd76886563efe679fd7b7b4d4e60a');
$domain = "sandboxddfe7013154b4d528d2e8c711a50aa5d.mailgun.org";

# Make the call to the client.
$result = $mgClient->sendMessage("$domain",
  array('from'    => 'postmaster@sandboxddfe7013154b4d528d2e8c711a50aa5d.mailgun.org>',
        'to'      => 'dillaalmakhzumi@gmail.com',
        'subject' => 'Hello Dilla',
        'text'    => 'Testing some Mailgun awesomeness!'));
 	}
}