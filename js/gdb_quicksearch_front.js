// Ajax Quick Search
$("#frontGameSearch").bind("focus input paste", function (event) {
    if (this.value)
    {
        $.post("../scripts/ajax_searchgame.php", "searchterm=" + $(this).val(), function (data) {
            if (data.result == 'success')
            {
                var resultsArray = [];
                $.each(data.games, function (index, value) {
                    var currentResult = ['<li>',
                        '<a href="<?php $baseurl; ?>/game/' + value.id + '">' + value.title + '<br>',
                        '<span>' + value.platform + '</span>',
                        '</a>',
                        '</li>'].join('\n');
                    resultsArray.push(currentResult);
                });
                var resultDisplay = ['<ul>',
                    resultsArray.join('\n'),
                    '</ul>'].join('\n');
                $('#ajaxSearchResults').html(resultDisplay);
                $('#ajaxSearchResults').slideDown();
            } else
            {
                $('#ajaxSearchResults').html('');
                $('#ajaxSearchResults').slideUp('fast');
            }
        }, "json");
    } else
    {
        $('#ajaxSearchResults').slideUp('fast');
    }

});
// Keyboard Navigation For Ajax QuickSearch
$('#frontGameSearch, #ajaxSearchResults').bind('keydown', function (e) {
    var ajaxParent = $(this).closest('form').children('#ajaxSearchResults').children('ul');
    if ($('#frontGameSearch').is(':focus'))
    {
        if (e.keyCode == 40)
        {
            ajaxParent.children('li').first().children('a').focus();
            return false;
        }
    } else
    {
        if (e.keyCode == 40)
        {
            $(':focus').parent().next().children('a').focus();
            e.preventDefault();
            return false;
        } else if (e.keyCode == 38)
        {
            $(':focus').parent().prev().children('a').focus();
            e.preventDefault();
            return false;
        } else if (e.keyCode == 8)
        {
            $('#frontGameSearch').focus();
            e.preventDefault();
            return false;
        }
    }
});
// Hide Ajax QuickSearch When Clicking Outside of Results
$(document).click(function (e)
{
    var container = $("#ajaxSearchResults");
    if (!container.is(e.target) && container.has(e.target).length === 0)
    {
        container.slideUp('fast');
    }
});