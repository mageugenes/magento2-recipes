define(['uiComponent',
    'jquery',
    'Mageugenes_Recipes/js/model/loader',
    'Magento_Ui/js/modal/modal'
], function (Component, $, loader, modal) {
    'use strict';

    return Component.extend({
        defaults: {
            template: 'Mageugenes_Recipes/recipes'
        },

        initialize: function () {
            loader.startLoader();

            this._super();

            loader.stopLoader();

            let options = {
                type: 'popup',
                responsive: true,
                modalClass: 'mageugenes-recipes-modal',
                buttons: [{
                    text: $.mage.__('Close'),
                    class: 'mageugenes-recipes-button',
                    click: function () {
                        this.closeModal();
                    }
                }],
                closed: function (){
                    $('.modal-inner-content .youtube-object').each(function(){
                        this.contentWindow.postMessage('{"event":"command","func":"stopVideo","args":""}', '*')
                    });
                }
            };

            $('.recipes-container').on('click', '.recipe-link a, .recipe-image.youtube a', function(event) {
                event.stopPropagation();

                let modalContainer = $('#mageugenes-recipes-modal');
                let recipeContainerClass = '.mageugenes-recipe';

                let popup = modal(options, modalContainer);
                modalContainer.modal('openModal');

                $('.modal-title', modalContainer).html($('.recipe-title h2', $(this).closest(recipeContainerClass)).html());
                $('.modal-inner-content .youtube-object', modalContainer).attr('src', $('.recipe-link a', $(this).closest(recipeContainerClass)).attr('href') + '?enablejsapi=1&version=3&playerapiid=ytplayer');

                return false;
            });

            return this;
        }
    });
});
