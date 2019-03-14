$(document).ready(function(){

    var lstorage = localStorage.getItem('language');
    (function(){
        $("[data-tr]").jqTranslate('translations/tr', {forceLang: lstorage});
        // localStorage.lang = 'spanish';
        // localStorage.setItem('lang', 'spanish');
    // alert( lasCookies );
    })();
    
    $("#english").on('click', function(event){
        (function(){
            localStorage.setItem('language', 'en');
            $("[data-tr]").jqTranslate('translations/tr', {forceLang: "en", asyncLangLoad: false});
            // localStorage['lang'] = 'spanish';
        })();
    });
    
    $("#spanish").on('click', function(event){
        (function(){
            localStorage.setItem('language', 'es');
            $("[data-tr]").jqTranslate('translations/tr', {forceLang: "es", asyncLangLoad: false});
        })();
    });
    
    $("#valencia").on('click', function(event){
        (function(){
            localStorage.setItem('language', 'val');
            $("[data-tr]").jqTranslate('translations/tr', {forceLang: "val", asyncLangLoad: false});
        })();
      });
  });