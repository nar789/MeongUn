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
    "cordova-plugin-headercolor": "1.0"
};
// BOTTOM OF METADATA
});