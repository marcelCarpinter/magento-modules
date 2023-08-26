define([
    "jquery",
    'Magento_Customer/js/customer-data'
], function ($, customerData) {
    'use strict';

    return function(config, element){
        console.log(config, element);
        
        const buttonsContainer = jQuery(element);

        const btnSuccess = buttonsContainer.find('#success');

        const btnError = buttonsContainer.find('#error');

        btnSuccess.click(function(ev){
            ev.preventDefault();
            let messagesList = customerData.get('customer')() || {};
            console.log(messagesList);
            let messages = messagesList.messages || [];
            
            messages.push(
                {
                    text: "Some message",
                    type: 'success'
                }
            );
            messagesList.messages = messages;
            customerData.set('messages', messagesList);
        })

        btnError.click(function(ev){
            ev.preventDefault();
            let messagesList = customerData.get('customer')() || {};
            console.log(messagesList);
            let messages = messagesList.messages || [];
            
            messages.push(
                {
                    text: "Some error message",
                    type: 'error'
                }
            );
            messagesList.messages = messages;
            customerData.set('messages', messagesList);
        })
    }
    
});