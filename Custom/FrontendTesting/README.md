** HOW TO DO A JASMINE TEST ON MAGENTO 2 **

**Create a Testing Directory:**

Considerations:
 - Module installed with a js file mapped at requirejs-config.js
 - Static files created (bin/magento setup:static-content:deploy -f)
 - You run the test from the magento root folder, so you need to have access to pub folder.
 - Install Nodejs
 - Install npm
 - Install grunt-cli
 
1. **Create a Test File:**
   - Inside testing directory (<magento_root>/dev/test/js/jasmine/tests/app/code/Vendor/ModuleName/frontend/js/<filename>.test.js), create a JavaScript spec file (ending in `.test.js`) for your JavaScript code. For example, if your JavaScript file is named `myModule.js`, your spec file might be named `myModule.test.js`.

2. **Write Your Jasmine Test:**
   - In your test file, write your Jasmine test cases for your JavaScript code. Here's a simple example:

   ```javascript
   // myModule.spec.js
   define(['jquery', 'myModule'], function($, myModule) {
       describe('My Module', function() {
           it('should add numbers correctly', function() {
               var result = myModule.add(2, 3);
               expect(result).toBe(5);
           });
       });
   });
   ```

   In this example, we assume that you're using RequireJS to load your JavaScript modules, and the mapped name is myModule.

3. **Configure Jasmine:**
   - Magento 2 typically uses Grunt for managing tasks like running tests. You may need to configure Grunt to run your Jasmine tests. Configuration files can be found in your Magento installation under
`dev/tests/js/jasmine/spec_runner/settings.json`. 
		
4. In <magento_root_dir>, create Gruntfile.js and copy Gruntfile.js.sample into it. 

5. In <magento_root_dir>, create package.json and copy package.json.sample into it.

6. In <magento_root_dir>, install all dependencies: npm install

7. Execute test file with:
 grunt spec:luma --file="dev/test/js/jasmine/tests/app/code/Vendor/ModuleName/frontend/js/filename.test.js"
 (luma is an example, it can be any other theme you have installed)
 
 You can set the path of the file to test at dev/tests/js/jasmine/spec_runner/settings.json so it runs the files you want. According to Magento documentation, the file should be executed automatically by adding it into the path, but it was not working, so I had to add it to the settings.
 
Optional:
- You can create Grunt configs at dev/tools/grunt/configs
- You can creat Grunt Tasks at dev/tools/grunt/tasks

** Troubleshooting **
If you have error: Could not find Chromium
 - Check that Chromium was installed when npm install was executed
 If not, run command: npm i pupeteer


