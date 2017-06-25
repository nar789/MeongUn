cordova.define('cordova/plugin_list', function(require, exports, module) {
module.exports = [
    {
        "id": "cordova-plugin-alertdialog.alertdialog",
        "file": "plugins/cordova-plugin-alertdialog/www/alert.js",
        "pluginId": "cordova-plugin-alertdialog",
        "clobbers": [
            "alertdialog"
        ]
    },
    {
        "id": "cordova-plugin-simple-toast.SimpleToastPlugin",
        "file": "plugins/cordova-plugin-simple-toast/www/simpletoastplugin.js",
        "pluginId": "cordova-plugin-simple-toast",
        "merges": [
            "simpleToastPlugin"
        ]
    },
    {
        "id": "cordova-plugin-sqlite-2.sqlitePlugin",
        "file": "plugins/cordova-plugin-sqlite-2/dist/sqlite-plugin.js",
        "pluginId": "cordova-plugin-sqlite-2",
        "clobbers": [
            "sqlitePlugin"
        ]
    },
    {
        "id": "cordova-plugin-splashscreen.SplashScreen",
        "file": "plugins/cordova-plugin-splashscreen/www/splashscreen.js",
        "pluginId": "cordova-plugin-splashscreen",
        "clobbers": [
            "navigator.splashscreen"
        ]
    },
    {
        "id": "com.borismus.webintent.WebIntent",
        "file": "plugins/com.borismus.webintent/www/webintent.js",
        "pluginId": "com.borismus.webintent",
        "clobbers": [
            "WebIntent"
        ]
    },
    {
        "id": "cordova-plugin-inappbrowser.inappbrowser",
        "file": "plugins/cordova-plugin-inappbrowser/www/inappbrowser.js",
        "pluginId": "cordova-plugin-inappbrowser",
        "clobbers": [
            "cordova.InAppBrowser.open",
            "window.open"
        ]
    },
    {
        "id": "cordova-plugin-statusbar.statusbar",
        "file": "plugins/cordova-plugin-statusbar/www/statusbar.js",
        "pluginId": "cordova-plugin-statusbar",
        "clobbers": [
            "window.StatusBar"
        ]
    },
    {
        "id": "cordova-plugin-headercolor.HeaderColor",
        "file": "plugins/cordova-plugin-headercolor/www/HeaderColor.js",
        "pluginId": "cordova-plugin-headercolor",
        "clobbers": [
            "cordova.plugins.headerColor"
        ]
    },
    {
        "id": "cordova-plugin-htj-kakaotalk.KakaoTalk",
        "file": "plugins/cordova-plugin-htj-kakaotalk/www/KakaoTalk.js",
        "pluginId": "cordova-plugin-htj-kakaotalk",
        "clobbers": [
            "KakaoTalk"
        ]
    },
    {
        "id": "cordova-plugin-sim.Sim",
        "file": "plugins/cordova-plugin-sim/www/sim.js",
        "pluginId": "cordova-plugin-sim",
        "merges": [
            "window.plugins.sim"
        ]
    },
    {
        "id": "cordova-plugin-sim.SimAndroid",
        "file": "plugins/cordova-plugin-sim/www/android/sim.js",
        "pluginId": "cordova-plugin-sim",
        "merges": [
            "window.plugins.sim"
        ]
    },
    {
        "id": "cordova-plugin-urlhandler.LaunchMyApp",
        "file": "plugins/cordova-plugin-urlhandler/www/android/LaunchMyApp.js",
        "pluginId": "cordova-plugin-urlhandler",
        "clobbers": [
            "window.plugins.launchmyapp"
        ]
    },
    {
        "id": "cordova-promise-polyfill.Promise",
        "file": "plugins/cordova-promise-polyfill/www/Promise.js",
        "pluginId": "cordova-promise-polyfill",
        "runs": true
    },
    {
        "id": "cordova-promise-polyfill.promise.min",
        "file": "plugins/cordova-promise-polyfill/www/promise.min.js",
        "pluginId": "cordova-promise-polyfill"
    },
    {
        "id": "cordova-plugin-admob-free.AdMob",
        "file": "plugins/cordova-plugin-admob-free/www/admob.js",
        "pluginId": "cordova-plugin-admob-free",
        "clobbers": [
            "admob",
            "AdMob",
            "plugins.AdMob"
        ]
    },
    {
        "id": "cordova-plugin-fcm.FCMPlugin",
        "file": "plugins/cordova-plugin-fcm/www/FCMPlugin.js",
        "pluginId": "cordova-plugin-fcm",
        "clobbers": [
            "FCMPlugin"
        ]
    }
];
module.exports.metadata = 
// TOP OF METADATA
{
    "cordova-plugin-whitelist": "1.3.2",
    "cordova-plugin-alertdialog": "1.0.1",
    "cordova-plugin-simple-toast": "1.0.0",
    "cordova-plugin-sqlite-2": "1.0.4",
    "cordova-plugin-splashscreen": "4.0.3",
    "com.borismus.webintent": "1.0.0",
    "cordova-plugin-inappbrowser": "1.7.1",
    "cordova-plugin-statusbar": "2.2.3",
    "cordova-plugin-headercolor": "1.0",
    "cordova-plugin-htj-kakaotalk": "1.0.0",
    "cordova-plugin-sim": "1.3.3",
    "cordova-plugin-urlhandler": "0.7.0",
    "cordova-promise-polyfill": "0.0.2",
    "cordova-admob-sdk": "0.7.0",
    "cordova-plugin-admob-free": "0.9.0",
    "cordova-plugin-fcm": "2.1.2"
};
// BOTTOM OF METADATA
});