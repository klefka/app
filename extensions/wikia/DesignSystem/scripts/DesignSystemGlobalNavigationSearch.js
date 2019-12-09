$(function ($) {
	'use strict';

	var $globalNav = $('.wds-global-navigation'),
		$searchContainer = $globalNav.find('.wds-global-navigation__search-container'),
		$searchInput = $globalNav.find('.wds-global-navigation__search-input'),
		$searchSubmit = $globalNav.find('.wds-global-navigation__search-submit'),
		$searchToggle = $globalNav.find('.wds-global-navigation__search-toggle'),
		$internalScopeButton = $globalNav.find('.wds-global-navigation__search-scope-internal__button'),
		$crosswikiScopeButton = $globalNav.find('.wds-global-navigation__search-scope-crosswiki__button'),
		$internalScopeLabel = $globalNav.find('.wds-global-navigation__search-scope-internal__label'),
		$crosswikiScopeLabel = $globalNav.find('.wds-global-navigation__search-scope-crosswiki__label'),
		$searchScopeDropdown = $globalNav.find('.wds-global-navigation__search-scope-dropdown'),
		activeSearchClass = 'wds-search-is-active',
		activeClass = 'wds-is-active',
		scopeValue = $globalNav.find('.wds-global-navigation__search-scope__value');

	function activateSearch() {
		if (!$globalNav.hasClass(activeSearchClass)) {
			$globalNav.addClass(activeSearchClass);
			$searchInput.focus();
		}
		if (!$searchScopeDropdown.hasClass(activeSearchClass)) {
			$searchScopeDropdown.addClass(activeSearchClass);
		}
	}

	function switchActive($toActivate, $toDeactivate) {
		if (!$toActivate.hasClass(activeClass)) {
			$toActivate.addClass(activeClass);
		}
		if ($toDeactivate.hasClass(activeClass)) {
			$toDeactivate.removeClass(activeClass);
		}
	}

	function switchScope(e) {
		let elem = $(e.target);
		if (elem.is($internalScopeButton)) {
			switchActive($internalScopeLabel, $crosswikiScopeLabel);
			scopeValue.val('internal');
			scopeValue.change();
		}
		if (elem.is($crosswikiScopeButton)) {
			switchActive($crosswikiScopeLabel, $internalScopeLabel);
			scopeValue.val( 'crosswiki');
			scopeValue.change();
		}
		e.stopPropagation();
	}

	function deactivateSearch() {
		$searchSubmit.prop('disabled', true);
		$searchInput.val('');
		$globalNav.removeClass(activeSearchClass);
		$searchContainer.removeClass('wds-search-is-focused');
		$searchScopeDropdown.removeClass(activeSearchClass);
	}

	$internalScopeButton.click(switchScope);
	$crosswikiScopeButton.click(switchScope);

	$searchInput.on('input', function () {
		var textLength = this.value.length;

		if (textLength > 0 && $searchSubmit.prop('disabled')) {
			$searchSubmit.prop('disabled', false);
		} else if (textLength === 0) {
			$searchSubmit.prop('disabled', true);
		}
	});

	$searchInput
		.on('keydown', function (event) {
			// Escape key
			if (event.which === 27) {
				deactivateSearch();
				$searchInput.blur();
			}
		})
		.on('focus', function () {
			$searchContainer.addClass('wds-search-is-focused');
		});

	$globalNav.find('.wds-global-navigation__search-close').on('click', deactivateSearch);

	if ($searchInput.val().length === 0) {
		$searchSubmit.prop('disabled', true);
	}

	$searchToggle.click(activateSearch);
});
