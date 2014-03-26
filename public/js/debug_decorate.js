$(function(){
    if ($('#codeigniter_profiler').length > 0) {
        var prof = $('<div>', {
            id: 'profiler',
            html: $('<img>', {
                height: 43,
                width: 154,
                alt: 'Toggle Profiler',
                title: 'Toggle Profiler',
                src: 'img/nav_toggle_darker.jpg'
            }),
            click: function() {
                $('#codeigniter_profiler').slideToggle();
            }
        });
        $('body').prepend(prof);
        $('body').prepend($('#codeigniter_profiler'));
        $('#codeigniter_profiler').css('display', 'none');
    }
});