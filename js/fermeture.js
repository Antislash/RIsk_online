window_beforeUnload = function(e) {
    var message = 'a message';

    e = e || e.event;

    Ext.Ajax.request({
        url:'/echo/json/?bu',
        async:false,
        method:'POST'
    });

    if (e) {
        e.returnValue = message;
    }

    return message;
};

window_unload = function(e) {

    Ext.Ajax.request({
        url:'/echo/json/?u',
        async:false,
        method:'POST'
    });
};

if (window.addEventListener) {
    window.addEventListener('beforeunload', window_beforeUnload, false);
} else if (window.attachEvent) {
    window.attachEvent('onbeforeunload', window_beforeUnload);
} else {
    throw "Cannot attach event handler";
}

if (window.addEventListener) {
    window.addEventListener('unload', window_unload, false);
} else if (window.attachEvent) {
    window.attachEvent('onunload', window_unload);
} else {
    throw "Cannot attach event handler";
}
