describe( 'Modal module', function() {
	'use strict';

	var browserDetect = {},
		modal = modules[ 'wikia.ui.modal' ]( jQuery, window, browserDetect );

	it( 'registers AMD module', function() {
		expect( modal ).toBeDefined();
		expect( typeof modal ).toBe( 'object' );
	} );

	it( 'gives nice and clean API', function() {
		expect( typeof modal.init ).toBe( 'function', 'init' );
		expect( typeof modal.createComponent ).toBe( 'function', 'init' );
	} );

	it( 'create instance of Modal class and link it with DOM element ID', function() {
		var id = 'testModal',
			selector = '#' + id,
			modalObject = modal.init( id );

		expect( typeof modalObject ).toBe( 'object' );
		expect( modalObject.$element.selector ).toBe( selector );
	} );

	it( 'render modal, append to DOM nad create instance of Modal class', function() {
		var params = {
				vars: {
					id: 'testModal',
				}
			},
			id = params.vars.id,
			modalSelector = '#' + id,
			htmlMock = '<div id="' + id + '"></div>',
			uiComponent = {
				render: function() {
					return htmlMock;
				}
			},
			modalObject = modal.createComponent( params, uiComponent);

		expect( document.body.innerHTML.indexOf( htmlMock ) ).toNotBe( -1 );
		expect( typeof modalObject ).toBe( 'object' );
		expect( modalObject.$element.selector ).toBe( modalSelector );
	} );

});

describe( 'Modal events', function() {
	'use strict';

	var browserDetect = {},
		module = modules[ 'wikia.ui.modal' ]( jQuery, window, browserDetect),
		modal = null;

	beforeEach( function() {
		modal = module.init( 'test' );
	} );

	it( 'triggers the event listener exactly once', function() {
		var listeners = {
			onFoo : function () { }
		};
		spyOn( listeners, 'onFoo' );

		modal.bind( 'foo', listeners.onFoo );
		modal.trigger( 'foo' );

		expect( listeners.onFoo ).toHaveBeenCalled();
		expect( listeners.onFoo.calls.length ).toEqual( 1 );
	} );

	it( 'triggers the proper event listener', function() {
		var listeners = {
			onFoo : function () { },
			onBar : function () { }
		};
		spyOn( listeners, 'onFoo' );
		spyOn( listeners, 'onBar' );

		modal.bind( 'foo', listeners.onFoo );
		modal.bind( 'bar', listeners.onBar );
		modal.trigger( 'foo' );
		modal.trigger( 'foo' );

		expect( listeners.onFoo ).toHaveBeenCalled();
		expect( listeners.onFoo.calls.length ).toEqual( 2 );
		expect( listeners.onBar ).not.toHaveBeenCalled();
	} );

	it( 'triggers all event listeners', function() {
		var listeners = {
			onFoo1 : function () { },
			onFoo2 : function () { }
		};
		spyOn( listeners, 'onFoo1' );
		spyOn( listeners, 'onFoo2' );

		modal.bind( 'foo', listeners.onFoo1 );
		modal.bind( 'foo', listeners.onFoo2 );
		modal.trigger( 'foo' );

		expect( listeners.onFoo1 ).toHaveBeenCalled();
		expect( listeners.onFoo1.calls.length ).toEqual( 1 );
		expect( listeners.onFoo2 ).toHaveBeenCalled();
		expect( listeners.onFoo2.calls.length ).toEqual( 1 );
	} );

	it( 'triggers event listeners in order', function() {
		var array = [],
			listeners = {
			onFoo1 : function () {
				array.push( 'foo1' );
			},
			onFoo2 : function () {
				array.push( 'foo2' );
			}
		};

		modal.bind( 'foo', listeners.onFoo1 );
		modal.bind( 'foo', listeners.onFoo2 );
		modal.trigger( 'foo' );

		expect( array ).toEqual( [ 'foo1', 'foo2' ] );
	} );

	it( 'allows listeners to return deferreds', function() {
		var listeners = {
			onFoo: function() {
				var deferred = new $.Deferred();
				deferred.resolve();
				return deferred.promise();
			},
			onTriggerComplete: function() { }
		};

		spyOn( listeners, 'onFoo' ).andCallThrough();
		spyOn( listeners, 'onTriggerComplete' );

		modal.bind( 'foo', listeners.onFoo );
		modal.trigger( 'foo' ).then( listeners.onTriggerComplete );
		expect( listeners.onFoo ).toHaveBeenCalled();
		expect( listeners.onFoo.calls.length ).toEqual( 1 );
		expect( listeners.onTriggerComplete ).toHaveBeenCalled();
		expect( listeners.onTriggerComplete.calls.length ).toEqual( 1 );
	} );

	it( 'allows event to be completed without listeners', function() {
		var listeners = {
			onTriggerComplete: function() { }
		};

		spyOn( listeners, 'onTriggerComplete' );
		modal.trigger( 'foo' ).then( listeners.onTriggerComplete );
		expect( listeners.onTriggerComplete ).toHaveBeenCalled();
		expect( listeners.onTriggerComplete.calls.length ).toEqual( 1 );
	} );

	it( 'allows to pass parameters to listeners', function() {
		var listeners = {
			onFoo: function() { }
		};

		spyOn( listeners, 'onFoo' );

		modal.bind( 'foo', listeners.onFoo );
		modal.trigger( 'foo', 1, 'test', [ 'bar' ] );

		expect( listeners.onFoo ).toHaveBeenCalledWith( 1, 'test', [ 'bar' ] );
	} );

	it( 'allows to use reject for canceling the event call', function() {
		var listeners = {
			onFoo1: function() {
				var deferred = new $.Deferred();
				deferred.reject();
				return deferred.promise();
			},
			onFoo2: function() {},
			onTriggerSuccess: function() {},
			onTriggerCancelled: function() {}
		};

		spyOn( listeners, 'onFoo1').andCallThrough();
		spyOn( listeners, 'onFoo2');
		spyOn( listeners, 'onTriggerSuccess');
		spyOn( listeners, 'onTriggerCancelled');

		modal.bind( 'foo', listeners.onFoo1 );
		modal.bind( 'foo', listeners.onFoo2 );
		modal.trigger( 'foo').then( listeners.onTriggerSuccess, listeners.onTriggerCancelled );

		expect( listeners.onFoo1 ).toHaveBeenCalled();
		expect( listeners.onFoo2 ).not.toHaveBeenCalled();
		expect( listeners.onTriggerSuccess ).not.toHaveBeenCalled();
		expect( listeners.onTriggerCancelled ).toHaveBeenCalled();
	} );

	it( 'allows to mix synchronous and asynchronous listeners', function() {
		var listeners = {
			onFoo1: function() {
				var deferred = new $.Deferred();
				deferred.resolve();
				return deferred.promise();
			},
			onFoo2: function() {},
			onTriggerSuccess: function() {}
		};

		spyOn( listeners, 'onFoo1').andCallThrough();
		spyOn( listeners, 'onFoo2');
		spyOn( listeners, 'onTriggerSuccess');

		modal.bind( 'foo', listeners.onFoo2 );
		modal.bind( 'foo', listeners.onFoo1 );
		modal.bind( 'foo', listeners.onFoo2 );
		modal.bind( 'foo', listeners.onFoo1 );
		modal.trigger( 'foo').then( listeners.onTriggerSuccess );

		expect( listeners.onFoo1 ).toHaveBeenCalled();
		expect( listeners.onFoo1.calls.length ).toEqual( 2 );
		expect( listeners.onFoo2 ).toHaveBeenCalled();
		expect( listeners.onFoo2.calls.length ).toEqual( 2 );
		expect( listeners.onTriggerSuccess ).toHaveBeenCalled();
		expect( listeners.onTriggerSuccess.calls.length ).toEqual( 1 );
	} );

});
