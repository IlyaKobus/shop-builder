function init(selector = '') {
    $(`${selector} input[type=checkbox]`).iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
    }).iCheck('update');

    tinymce.init({selector: `${selector} textarea`});
    $(`${selector} select`).select2();
}

global.init = init;

$(function () {
    init();

    $('body')
    /* ^^^^^^^^^^^^^^^^^^^^ DataTable Actions ^^^^^^^^^^^^^^^^^^^^^^^^ */
        .on('click', '.btn-data-edit', function () {
            $(this).siblings('form.form-data-edit').submit();
        })
        .on('click', '.btn-data-remove', function () {
            if (confirm('Are you sure you want to delete this item?')) {
                $(this).siblings('form.form-data-remove').submit();
            }
        })
        /* ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ */

        /* ^^^^^^^^^^^^^^^^^^^^^ Header Actions ^^^^^^^^^^^^^^^^^^^^^^^^^^^ */
        .on('click', 'a.button-logout', function () {
            let $form = $('form.form-logout').submit();
        })
        /* ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ */

        /* ^^^^^^^^^^^^^^^^^^^ Category Actions ^^^^^^^^^^^^^^^^^^^^^^^^^^^ */
        .on('click', '.btn-remove-attribute', function (e) {
            e.preventDefault();
            $(this).parents('.attribute-table__row').remove();
        })
        .on('click', '.btn-remove-option', function (e) {
            e.preventDefault();
            $(this).parents('.tab-pane__option-block').remove();
        })
        .on('click', '.btn-remove-option-value', function (e) {
            e.preventDefault();
            $(this).parents('.option-table__row').remove();
        })
        .on('click', '.btn-add-option-value', function (e) {
            e.preventDefault();
            var $formGroup = $(this).parents('.tab-pane__option-block').find('.form-group').last();
            if ($formGroup.find('.tab-pane__option-block__value:not(.d-none)').length === 4) {
                $(this).parents('.tab-pane__option-block').append($('<div>').addClass('form-group')
                    .append($('<div>')
                        .addClass('tab-pane__option-block__value col-md-3 d-none')
                    )
                );
                $formGroup = $(this).parents('.tab-pane__option-block').find('.form-group').last();
            }
            $formGroup.find('.tab-pane__option-block__value').last().after(
                $('<div>')
                    .addClass('col-md-2 tab-pane__option-block__value')
                    .append($('<input>')
                        .addClass('form-control')
                        .attr('placeholder', 'Value')
                        .attr('name', `option[${$(this).data('option-id')}][value][${$(this)
                            .parents('.tab-pane__option-block')
                            .find('.tab-pane__option-block__value:not(.d-none)').length}]`))
            );
        })
        .on('click', '.btn-add-attribute', function (e) {
            e.preventDefault();
            var $attributesBlock = $(this).siblings('.attribute-table');
            $.get(`/dashboard/product/attribute/${$attributesBlock.find('.attribute-table__row').length}`, function (res) {
                $attributesBlock.append(res);
                $('.attribute-table select').select2();
            });
        })
        .on('click', '.btn-add-option-value', function (e) {
            e.preventDefault();
            var $optionsTable = $(this).siblings('.option-value-table');
            $.get(`/dashboard/option/value/${$optionsTable.find('.option-table__row').length}`, function (res) {
                $optionsTable.append(res);
                $('.attribute-table select').select2();
            });
        })
        .on('click', '.btn-add-option', function (e) {
            e.preventDefault();
            var $attributesBlock = $(this).siblings('.tab-pane__block');
            $.get(`/dashboard/product/option/${$attributesBlock.find('.tab-pane__option-block').length}`, function (res) {
                $attributesBlock.append(res);
            });
            /* ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ */
        })
        .on('click', '.btn-add-image', function (e) {
            e.preventDefault();
            var $imagesTable = $(this).siblings('.images-block');
            $.get(`/dashboard/product/image/${$imagesTable.find('.attribute-table__row').length}`, function (res) {
                $imagesTable.append(res);
            });
        })

        /* ^^^^^^^^^^^^^^^^^^^^^^^ Image block ^^^^^^^^^^^^^^^^^^^^^^^ */
        .on('click', '.image-block__img', function () {
            $(this).siblings('input[type=file]').trigger('click');
        })
        .on('change', 'input[type=file]', function (e) {
            var file = $(this)[0].files[0];
            if (file.size > 8 * 1024 * 1024) { // 8 MB
                $(this)[0].files[0] = null;
                alert('Your image is too big!');
            } else {
                var target = $(this).siblings('.image-block__img')
                    .removeClass('image-block__img--clear');
                var reader = new FileReader();
                reader.onload = (function (theFile) {
                    return function (e) {
                        target.attr('src', e.target.result);
                    };
                })(file, target);
                file ? reader.readAsDataURL(file) : null;
                $(this).siblings('button')
                    .removeClass('d-none');
            }
        })
        .on('click', '.image-block__btn-remove', function (e) {
            e.preventDefault();
            $(this).parent().find('button')
                .addClass('d-none');
            $(this).siblings('input[type=file]').val('')[0].files[0] = null;
            $(this).siblings('.image-block__img')
                .addClass('image-block__img--clear')
                .attr('src', '/data/document-noimage.jpg');
        })
        .on('click', '.btn-remove-image', function (e) {
            e.preventDefault();
            $(this).closest('tr').remove();
        });
    /* ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ */

    /* ^^^^^^^^^^^^^^^^^^^^^^ LAYOUTS ^^^^^^^^^^^^^^^^^^^^^^^^^^^ */

    $('.box-body')
        .on('click', '.btn-add-module', function (e) {
            e.preventDefault();
            var $table = $(this).siblings('.modules-table');
            $.get(`/dashboard/layout/module/${$(this).data('type')}/${$table.find('.module-table__row').length}`, function (res) {
                $table.append(res);
                init();
            })
        })
        .on('click', '.btn-remove-module', function (e) {
            e.preventDefault();
            $(this).closest('tr').remove();
        })
        .on('change', '.modules-table select', function () {
            $(this).closest('tr').find('a.module-edit')
                .removeClass('d-none')
                .attr('href', `/dashboard/modules/${$(this).val()}/edit`);
        });
    /* ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ */

    /* ^^^^^^^^^^^^^^^^^^^^^^ Product Actions ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ */
    $('select[name^=categories]').selectTree({
        dataUrl: '/dashboard/category/tree',
        isOnlyLeavesEnabled: true,
        eventListeners: [
            {
                event: 'select2:select',
                f: function (e) {
                    var data = e.params.data;
                    $('select[name=primary_category]').append($('<option>').val(data.id).html(data.text.trim())).select2();
                }
            },
            {
                event: 'select2:unselect',
                f: function (e) {
                    var data = e.params.data;
                    $('select[name=primary_category]').find(`option[value=${data.id}]`).remove().select2();
                }
            }
        ],
    });

    $('input[name=is_discounted]')
        .on('ifChecked', function () {
            $('input[name=discount_price]').attr('disabled', 'disabled');
        })
        .on('ifUnchecked', function () {
            $('input[name=discount_price]').removeAttr('disabled');
        });

    $('select[name=options-list]')
        .on('select2:select', function (e) {
            var data = e.params.data;
            var _this = $(this);

            $.get(`/dashboard/product/option/${data.id}`, function (res) {
                $('.option-block__wrapper').append(res);
                _this.siblings('.options-list').append(
                    $('<li>')
                        .addClass('ui-widget-content')
                        .attr('rel', `option-block-${data.id}`)
                        .html(data.text)
                        .append(
                            $('<span>')
                                .addClass('fa fa-minus-square pull-right text-red')
                        )
                );

                $('#tab_option select').select2();
            });
        });

    $('.options-list')
        .on('click', 'li', function (e) {
            $(this).addClass('ui-selected').siblings().removeClass('ui-selected');
            $('.option-block').css('display', 'none');
            $(`#${$(this).attr('rel')}`).css('display', 'block');
        })
        .on('click', 'li span', function (e) {
            e.stopPropagation();
            $(this).parent().remove();
            $(`#${$(this).parent().attr('rel')}`).remove();
        });

    $('.option-block__wrapper')
        .on('click', '.btn-remove-product-option-value', function (e) {
            e.preventDefault();
            $(this).closest('tr').remove();
        })
        .on('click', '.btn-add-option-value', function (e) {
            e.preventDefault();
            var _this = $(this);
            var $optionBlock = _this.closest('.option-block');

            $.get(`/dashboard/product/option/${$optionBlock.data('option-id')}/${$optionBlock.find('.product-option-table__row').length}`, function (res) {
                $optionBlock.find('tbody').append(res);
                $('#tab_option select').select2();
            });
        });
    /* ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ */


    /* ^^^^^^^^^^^^^^^^^^^^^^ Customer Actions ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ */
    $('.btn-add-address').click(function (e) {
        e.preventDefault();
        var _this = $(this);
        var count = $('.customer-data-block').length;
        $.get(`/dashboard/customer/address/${count}`, function (res) {
            $('.customer-data-block__wrapper').append(res);
            _this.siblings('.customer-data-list').append(
                $('<li>')
                    .addClass('ui-widget-content')
                    .attr('rel', `customer-data-block-${count}`)
                    .html(`Address ${count}`)
                    .append(
                        $('<span>')
                            .addClass('fa fa-minus-square pull-right text-red')
                    )
            );

            $('.customer-data-block__wrapper select').select2();
        });
    });

    $('.customer-data-list')
        .on('click', 'li', function (e) {
            $(this).addClass('ui-selected').siblings().removeClass('ui-selected');
            $('.customer-data-block').css('display', 'none');
            $(`#${$(this).attr('rel')}`).css('display', 'block');
        })
        .on('click', 'li span', function (e) {
            e.stopPropagation();
            $(this).parent().remove();
            $(`#${$(this).parent().attr('rel')}`).remove();
        });
    /* ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ */

    /* ^^^^^^^^^^^^^^^^^^^^^^^^^ Order actions ^^^^^^^^^^^^^^^^^^^^^^^^^^ */
    $('select[name=customer_id]').select2({
        ajax: {
            url: '/dashboard/customer/search',
            data: function (params) {
                return {
                    search: params.term,
                };
            }
        }
    }).on('change.select2', function () {
        $.get(`/dashboard/customer/find/${$(this).val()}`, function (res) {
            console.log(res);
            $('select[name=customer_group_id]').val(res.customer_group_id).select2();
            $('input[name=first_name]').val(res.first_name);
            $('input[name=last_name]').val(res.last_name);
            $('input[name=email]').val(res.email);
            $('input[name=phone]').val(res.phone);
            $('select[name=customer_shipping_address_id], select[name=customer_payment_address_id]').html('').append(
                $('<option>').val(0).html(`Choose`).attr('disabled', 'disabled').attr('selected', 'selected')
            );
            res.addresses.forEach(function (address, i) {
                $('select[name=customer_shipping_address_id], select[name=customer_payment_address_id]').append(
                    $('<option>').val(address.id).html(`Address ${i}`)
                ).select2();
            });
        });
    });

    $('select[name=product_id]').select2({
        ajax: {
            url: '/dashboard/product/search',
            data: function (params) {
                return {
                    search: params.term,
                };
            }
        }
    });

    $('.btn-order-add-product').on('click', function (e) {
        e.preventDefault();
        var count = $('.product-data-block').length;
        var _this = $('select[name=product_id]');
        $.get(`/dashboard/order/product/${_this.val()}/${count}`, function (res) {
            $('.product-data-block__wrapper').append(res);
            $('.product-data-list').append(
                $('<li>')
                    .addClass('ui-widget-content')
                    .attr('rel', `product-data-block-${count}`)
                    .html(_this.find(`option[value=${_this.val()}]`).html())
                    .append(
                        $('<span>')
                            .addClass('fa fa-minus-square pull-right text-red')
                    )
            );
        });
    });

    $('.product-data-list')
        .on('click', 'li', function (e) {
            $(this).addClass('ui-selected').siblings().removeClass('ui-selected');
            $('.product-data-block').css('display', 'none');
            $(`#${$(this).attr('rel')}`).css('display', 'block');
        })
        .on('click', 'li span', function (e) {
            e.stopPropagation();
            $(this).parent().remove();
            $(`#${$(this).parent().attr('rel')}`).remove();
        });

    $('select[name=customer_payment_address_id]').on('select2:select', function () {
        $.get(`/dashboard/customer/address/find/${$(this).val()}`, function (res) {
            $('input[name="payment[address]"]').val(res.address);
            $('input[name="payment[city]"]').val(res.city);
            $('input[name="payment[postcode]"]').val(res.postcode);
            $('input[name="payment[country]"]').val(res.country);
            $('input[name="payment[region]"]').val(res.region);
        });
    });

    $('select[name=customer_shipping_address_id]').on('select2:select', function () {
        $.get(`/dashboard/customer/address/find/${$(this).val()}`, function (res) {
            $('input[name="shipping[address]"]').val(res.address);
            $('input[name="shipping[city]"]').val(res.city);
            $('input[name="shipping[postcode]"]').val(res.postcode);
            $('input[name="shipping[country]"]').val(res.country);
            $('input[name="shipping[region]"]').val(res.region);
        });
    });
    /* ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ */

    /* ^^^^^^^^^^^^^^^^^^ Order actions ^^^^^^^^^^^^^^^^^^ */
    $('table.permissions-table').on('click', '.btn-remove-permission', function (e) {
        e.preventDefault();
        $(this).closest('.permissions-table__row').remove();
    });

    $('.btn-add-permission').click(function (e) {
        e.preventDefault();
        $.get(`/dashboard/user-groups/permission/${$('table.permissions-table').find('.permissions-table__row').length}`, function (res) {
            $('table.permissions-table').append(res);
            init('table.permissions-table');
        });
    });
    /* ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ */

    /* ^^^^^^^^^^^^^^^^^^ Category actions ^^^^^^^^^^^^^^^^^^ */

    $('select[name=parent_id]').selectTree({
        dataUrl: '/dashboard/category/tree',
    });

    $('input[name=is_root]')
        .on('ifChecked', function () {
            $('select[name=parent_id]').attr('disabled', 'disabled');
        })
        .on('ifUnchecked', function () {
            $('select[name=parent_id]').removeAttr('disabled');
        });
    /* ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ */
});