define([
    'jquery',
    'Custom_FrontendTesting/js/myModule'
], function($, myModule){
    describe('Module', function(){
        it('should', function(){
            const result = myModule.start();
            expect(result).toBe("a");
        });
    });
});