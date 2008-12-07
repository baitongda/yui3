<div id="testLogger"></div>
<script type="text/javascript">
YUI(<?php echo($yuiConfig); ?>).use(<?php echo($requiredModules); ?>,function (Y) {

    Y.namespace("example.yuitest");
    
    Y.example.yuitest.DataTestCase = new Y.Test.Case({
    
        //name of the test case - if not provided, one is auto-generated
        name : "Data Tests",
        
        //---------------------------------------------------------------------
        // setUp and tearDown methods - optional
        //---------------------------------------------------------------------
        
        /*
         * Sets up data that is needed by each test.
         */
        setUp : function () {
            this.data = {
                name: "yuitest",
                year: 2007,
                beta: true
            };
        },
        
        /*
         * Cleans up everything that was created by setUp().
         */
        tearDown : function () {
            delete this.data;
        },
        
        //---------------------------------------------------------------------
        // Test methods - names must begin with "test"
        //---------------------------------------------------------------------
        
        testName : function () {
            var Assert = Y.Assert;
            
            Assert.isObject(this.data);
            Assert.isString(this.data.name);
            Assert.areEqual("yuitest", this.data.name);            
        },
        
        testYear : function () {
            var Assert = Y.Assert;
            
            Assert.isObject(this.data);
            Assert.isNumber(this.data.year);
            Assert.areEqual(2007, this.data.year);            
        },
        
        testBeta : function () {
            var Assert = Y.Assert;
            
            Assert.isObject(this.data);
            Assert.isBoolean(this.data.beta);
            Assert.isTrue(this.data.beta);
        }
    
    });
    
    Y.example.yuitest.ArrayTestCase = new Y.Test.Case({
    
        //name of the test case - if not provided, one is auto-generated
        name : "Array Tests",
        
        //---------------------------------------------------------------------
        // setUp and tearDown methods - optional
        //---------------------------------------------------------------------
        
        /*
         * Sets up data that is needed by each test.
         */
        setUp : function () {
            this.data = [0,1,2,3,4]
        },
        
        /*
         * Cleans up everything that was created by setUp().
         */
        tearDown : function () {
            delete this.data;
        },
        
        //---------------------------------------------------------------------
        // Test methods - names must begin with "test"
        //---------------------------------------------------------------------
        
        testPop : function () {
            var Assert = Y.Assert;
            
            var value = this.data.pop();
            
            Assert.areEqual(4, this.data.length);
            Assert.areEqual(4, value);            
        },        
        
        testPush : function () {
            var Assert = Y.Assert;
            
            this.data.push(5);
            
            Assert.areEqual(6, this.data.length);
            Assert.areEqual(5, this.data[5]);            
        },
        
        testSplice : function () {
            var Assert = Y.Assert;
            
            this.data.splice(2, 1, 6, 7);
            
            Assert.areEqual(6, this.data.length);
            Assert.areEqual(6, this.data[2]);           
            Assert.areEqual(7, this.data[3]);           
        }
    
    });    

    Y.example.yuitest.ExampleSuite = new Y.Test.Suite("Example Suite");
    Y.example.yuitest.ExampleSuite.add(Y.example.yuitest.DataTestCase);
    Y.example.yuitest.ExampleSuite.add(Y.example.yuitest.ArrayTestCase);

    //create the console
    var r = new Y.Console({
        verbose : true,
        //consoleLimit : 10,
        newestOnTop : false
    });
    
    r.render('#testLogger');
    
    Y.Test.Runner.add(Y.example.yuitest.ExampleSuite);

    //run the tests
    Y.Test.Runner.run();

});
</script>