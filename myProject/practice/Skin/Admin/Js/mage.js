var Base = function(){

}
Base.prototype = {
    alert: function(){
        alert('111');
    },

    url: null,
    params: {},
    method: 'post',
    form: null,

    setUrl: function(url){
        this.url = url;
        return this;
    },
    getUrl: function(){
        return this.url;
    },
    setMethod: function(method){
        this.method = method;
        return this;
    },
    getMethod: function(){
        return this.method;
    },
    setParams: function(params){
        this.params = params;
        return this;
    },
    resetParams: function(){
        this.params = {};
        return this;
    },
    getParams: function(){
        if (typeof key === 'undefined') {
            return this.params;
        }
        if (typeof this.params[key] == 'undefined') {
            return null;
        }
        return this.params[key];
    },
    addparam: function(key, value){
        this.params[key] = value;
        return this;
    },
    removeParam: function(key){
        if(typeof this.params[key] != 'undefined'){
            delete this.params[key];
        }
        return this;
    },
    setFileForm: function(button, id){
        form = $(button).parents("form");
        var data = new FormData();
        var file = $(id)[0].files;
        data.append('file', file[0]);
        this.setParams(data);
        this.setMethod(form.attr('method'));
        this.setUrl(form.attr('action'));
        return this;
    },
    uploadFile: function(){
        var self = this;
        let request = $.ajax({
            type: this.getMethod(),
            url: this.getUrl(),
            data: this.getParams(),
            contentType: false,
            processData: false,
            success: function(response){
                self.manageHtml(response);
                self.resetParams();
            }
        });
        return this;
    },
    load: function(){

        var self = this; 

        var request = $.ajax({
            method: this.getMethod(),
            url: this.getUrl(),
            data: this.getParams(),
            success: function(response){
                self.manageHtml(response);
            }
        });

    },
    manageHtml: function(response)
    {
        if(typeof response.element == 'undefined')
        {
            return false;
        }
        if (typeof response.element == 'object')
        {
            $(response.element).each(function(i, element) {

                $(element.selector).html(element.html);
            })
        }else
        {
            $(response.element.selector).html(response.element.html);
        }
    },
    setForm: function(button){
        this.form = $(button).closest("form");
        this.setParams(this.form.serialize());
        this.setMethod(this.form.attr('method'));
        this.setUrl(this.form.attr('action'));
        return this;
    },
    getForm: function(){
        return this.form;
    }
}


var mage = new Base();


   