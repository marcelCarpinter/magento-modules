/**
 * @api
 */
define([
    'ko',
    'jquery',
    'uiComponent',
    'jquery-ui-modules/effect-blind'
], function (ko, $, Component) {
    'use strict';

    return Component.extend({
        defaults: {
            selector: '[data-role=custom-messages]',
            hideTimeout: 5000,
            hideSpeed: 500,
            listens: {
                isHidden: 'onHiddenChange'
            }
        },
        messages: ko.observableArray([]),
        /** @inheritdoc */
        initialize: function (config) {
            this._super()
                .initObservable();

            this.show();

            return this;
        },

        /**
         * 
         */
        show: function (){
            this.messages.push({
                type: "success",
                text: "Some new text here",
                title: "This is a totally custom template for alerts"
            })
            
        }
    });
});
