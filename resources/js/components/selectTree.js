// TODO refactor this nightmare

/*
TreeSelect2 component

Options:
dataUrl: url to data source,
isOnlyLeavesEnabled: mark all nodes that have children as disabled,
eventListeners: additional event listeners {e: event name, f: callback function}
 */

$.fn.selectTree = function (options) {
    var _this = this;
    $.get(options.dataUrl, function (categories) {
        var buildTree = function ($selector) {
            var deeps = -1;
            var currentValue = $selector.find('option:selected').map(function () {
                return parseInt($(this).val());
            }).toArray();
            $selector.html('');
            var action = function callee($selector, cats) {
                deeps++;
                cats.forEach(function (cat) {
                    var $option = $('<option>').val(cat.id).html(addSpaces(deeps) + cat.name);
                    if (currentValue.indexOf(cat.id) !== -1) {
                        $option.attr('selected', 'selected')
                    }
                    if (cat.children.length && options.isOnlyLeavesEnabled) {
                        $option
                            .attr('disabled', 'disabled')
                    }
                    $selector.append($option);
                    if (cat.children.length) {
                        callee($selector, cat.children);
                    }
                });
                deeps--;
            };
            return action.bind(null, $selector);
        };

        function addSpaces(times) {
            var string = '';
            var i = times;
            while (i) {
                string += '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                i--;
            }
            return string;
        }

        var $selector = _this;

        var tree = buildTree($selector);
        tree(categories);

        if (options.eventListeners !== undefined) {
            options.eventListeners.forEach(function (dispatcher) {
                $selector.select2()
                    .on(dispatcher.event, dispatcher.f);
            });
        }

        $selector.select2()
            .on('change', function () {
                var $select2Output = $(this).siblings('.select2').find('.select2-selection__rendered');
                var $text = $select2Output.html().replace(/&nbsp;/gi, '');
                $select2Output.html($text);
            });

        $selector.trigger('change');
    });
};