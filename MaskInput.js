function maskTel(el) {
        if ( ! window.maskTel_k ) {
            window.maskTel_k = 10;
        }
        window.maskTel_k--;
        if (window.maskTel_k <= 0) return;
        if (typeof ($.masksLoad) == 'indefined') {
            setTimeout(function () {
                maskTel(el)
            }, 200)
        } else {
            window.maskTel_k = 10;
            var maskList = $.masksSort($.masksLoad( npqp_params.npqp_plugin_js_url + "/phone-codes.json"), ['#'], /[0-9]|#/, "mask");
            var maskOpts = {
                inputmask: {
                    definitions: {
                        '#': {validator: "[0-9]", cardinality: 1}
                    },
                    clearIncomplete: true,
                    showMaskOnHover: false,
                    autoUnmask: true
                },
                match: /[0-9]/,
                replace: '#',
                list: maskList,
                listKey: "mask",
            }
            $(el).inputmasks(maskOpts);
        }
    }

    if ( $('#billing_phone').length ) {
        maskTel( $('#billing_phone') );
    }

    if ( $('#shipping_phone').length ) {
        maskTel( $('#shipping_phone') );
    }
