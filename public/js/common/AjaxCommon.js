function AjaxCommon(opts) {
    this.options = {
        url: '',
        method: 'POST',
        data: {},
        auto: false,
        is_loading: false,
    }

    this.init = function (opts) {
        this.options = $.extend(this.options, opts);
        if (this.options.auto) {
            this.load();
        }
    }

    this.load = function () {
        if (this.options.is_loading === true) {
            console.log('Request has not yet!');
            return;
        }
        
        var that = this;
        
        $.ajax({
            url: that.options.url,
            type: that.options.method,
            data: that.options.data,
            dataType: 'json',
            // beforeSend: that.loading,
            success: function (result, textStatus, jqXHR) {
                that.callback(result);
                
            },
            complete: function() {
                that.options.is_loading = false;
            }
        });
    }

    this.callback = function(result) {

    }

    this.init(opts);
}