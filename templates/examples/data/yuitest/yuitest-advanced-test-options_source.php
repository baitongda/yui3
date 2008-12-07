<div id="testLogger"></div>
<script type="text/javascript">
YUI(<?php echo($yuiConfig); ?>).use(<?php echo($requiredModules); ?>,function (Y) {

    Y.namespace("example.yuitest");
    
    Y.example.yuitest.AdvancedOptionsTestCase = new Y.Test.Case({
    
        //the name of the test case - if not provided, one is automatically generated
        name: "Advanced Options Tests",
        
        /*
         * Specifies tests that "should" be doing something other than the expected.
         */
        _should: {
        
            /*
             * Tests listed in here should fail, meaning that if they fail, the test
             * has passed. This is used mostly for YuiTest to test itself, but may
             * be helpful in other cases.
             */
            fail: {
            
                //the test named "testFail" should fail
                testFail: true
            
            },
            
            /*
             * Tests listed here should throw an error of some sort. If they throw an
             * error, then they are considered to have passed.
             */
            error: {
            
                /*
                 * You can specify "true" for each test, in which case any error will
                 * cause the test to pass.
                 */
                testGenericError: true,
                
                /*
                 * You can specify an error message, in which case the test passes only
                 * if the error thrown matches the given message.
                 */
                testStringError: "I'm a specific error message.",
                testStringError2: "I'm a specific error message.",
                
                /*
                 * You can also specify an error object, in which case the test passes only
                 * if the error thrown is on the same type and has the same message.
                 */
                testObjectError: new TypeError("Number expected."),            
                testObjectError2: new TypeError("Number expected."),
                testObjectError3: new TypeError("Number expected.")
            
            },
            
            /*
             * Tests listed here should be ignored when the test case is run. For these tests,
             * setUp() and tearDown() are not called.
             */
            ignore : {
            
                testIgnore: true
                
            }    
        },
        
        //-------------------------------------------------------------------------
        // Basic tests - all method names must begin with "test"
        //-------------------------------------------------------------------------
        
        testFail : function() {
        
            //force a failure - but since this test "should" fail, it will pass
            Y.Assert.fail("Something bad happened.");
            
        },
        
        testGenericError : function() {    
            throw new Error("Generic error");        
        },
        
        testStringError : function() {
            
            //throw a specific error message - this will pass because it "should" happen
            throw new Error("I'm a specific error message.");    
        },
        
        testStringError2 : function() {
            
            //throw a specific error message - this will fail because the message isn't expected
            throw new Error("I'm a specific error message, but a wrong one.");    
        },
        
        testObjectError : function() {
            
            //throw a specific error and message - this will pass because it "should" happen
            throw new TypeError("Number expected.");    
        },
        
        testObjectError2 : function() {
            
            //throw a specific error and message - this will fail because the type doesn't match
            throw new Error("Number expected."); 
        },
        
        testObjectError3 : function() {
            
            //throw a specific error and message - this will fail because the message doesn't match
            throw new TypeError("String expected.");    
        },
        
        testIgnore : function () {
            alert("You'll never see this.");
        }
        
    });        
     
     
    //create the console
    var r = new Y.Console({
        verbose : true,
        newestOnTop : false
    });
    
    r.render('#testLogger');
    
    Y.Test.Runner.add(Y.example.yuitest.AdvancedOptionsTestCase);

    //run the tests
    Y.Test.Runner.run();
});

</script>