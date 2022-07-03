# PHP Server Code for Firebase Notification

The `notification.php` file helps you send notifications to your Firebase clients (Android, Web or iOS) via Firebase HTTPV1 API.

## Pre-requisite
1. To use this code, you need `Google Auth Library for PHP` to authenticate your notification requests. 
2. Follow this [link](https://github.com/googleapis/google-auth-library-php) to install it on your server.

## How to use
1. To send notification via Firebase, you need a private key file for your service account. You can get it by following this [link](https://firebase.google.com/docs/cloud-messaging/auth-server?authuser=0#provide-credentials-manually).
2. Once you got service json file, **Upload it on your server at some safe path not accessible to public user preferrably in the root directory of your server and rename it to `server.json`**.
3. Edit `notification.php` and replace <user_dir> with your root directory path.
4. Now in your main PHP code, include `notification.php`, initialize Notification object with your Firebase project id (Which you can get on the Firebase console) and call `sendToTopic` method with `topic`,`title` and `body` as arguments. `sendToTopic` will return true if everything succeeds else it will return false.
