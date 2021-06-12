/**
 * File main.js.
 *
 * Contains events and methods to handle menus and sidebars.
 *
 * @package gautam
 */

document.addEventListener(
	"DOMContentLoaded",
	function (event) {

		const searchButton         = document.querySelector( ".gautam-search" );
		const searchModal          = document.querySelector( ".popup_search_modal" );
		const searchCloseBtn       = document.querySelector( ".popup_modal_close_button" );
		const searchField          = document.querySelector( ".search-field" );
		const scrollToTopButton    = document.getElementById( "js-top" );
		const fixedHeader          = document.querySelector( ".header-fixed" );
		const fixedHeaderContainer = document.querySelector( ".header-fixed header" );
		const siteContainer        = document.querySelector( ".site-container" );
		const inHeader             = document.querySelector( ".single.in-header" );
		const hamburgerBtn         = document.querySelector( ".hamburger-menu" );
		const menuCloseBtn         = document.querySelector( ".mobile-cls-btn" );
		const headerMenuContainer  = document.querySelector( ".header-menu-container" );
		const primaryMenu          = document.getElementById( "primary-menu" );
		const subMenu              = document.querySelectorAll( "#primary-menu .sub-menu" );

		// Adding the dropdown button.
		// subMenu.forEach(
		// el =>
		// el.insertAdjacentHTML(
		// "beforebegin",
		// '<button class="drawer-dropdown-button toggle" ><span class="plus"><i class="fa fa-plus"></i></span><span class="minus"><i class="fa fa-minus"></i></span></button>'
		// )
		// );

		// Holding temp class name when mobile menu is open.
		let tempClassMobileMenu;

		// Holding temp class name whe header is fixed.
		let tempClassFixedHeader;

		searchButton && searchButton.addEventListener( "click", openSearchModal );

		searchButton &&
		searchButton.addEventListener(
			"keypress",
			function (e) {
				if (e.key === "Enter" || e.key === " ") {
					openSearchModal();
				}
			}
		);

		searchCloseBtn && searchCloseBtn.addEventListener( "click", closeSearchModal );

		searchCloseBtn && searchCloseBtn.addEventListener(
			"keypress",
			function (event) {
				if (e.key === "Enter" || e.key === " ") {
					closeSearchModal();
				}
			}
		);

		function closeSearchModal() {
			searchModal.classList.toggle( "visible" );
			searchButton.focus();
		}

		function openSearchModal() {
			searchModal.classList.toggle( "visible" );
			searchField.focus();
			trapFocus( ".popup_search_modal", 1 );
		}

		if (fixedHeader) {
			tempClassFixedHeader = fixedHeaderContainer.className;
		}

		// window.addEventListener( "scroll", scrollFunc );

		scrollToTopButton && scrollToTopButton.addEventListener(
			"click",
			function (e) {
				e.preventDefault();
				scrollToTop();
			}
		);

		function scrollFunc() {

			let y = window.scrollY;

			if (y > 0) {
				scrollToTopButton.className = "top-link show";

				if (fixedHeader) {
					fixedHeaderContainer.classList.remove(
						"flex-dir-column",
						"flex-dir-column-reverse"
					);
					fixedHeader.classList.add( "fixed-header", "showed" );
					if ( ! inHeader) {
						siteContainer.style.paddingTop = "10vh";
					}
				}
			} else {
				scrollToTopButton.className = "top-link hide";
				if (fixedHeader) {
					fixedHeader.classList.remove( "fixed-header", "showed" );
					fixedHeaderContainer.className = tempClassFixedHeader;
					if ( ! inHeader) {
						siteContainer.style.paddingTop = 0;
					}
				}
			}
		}

		function scrollToTop() {
			const c = document.documentElement.scrollTop || document.body.scrollTop;

			if (c > 0) {
				window.requestAnimationFrame( scrollToTop );
				window.scrollTo( 0, c - c / 10 );
			}
		}

		hamburgerBtn && hamburgerBtn.addEventListener( "click", hamburgerMenu );

		menuCloseBtn && menuCloseBtn.addEventListener( "click", hamburgerMenu );

		hamburgerBtn &&
		hamburgerBtn.addEventListener(
			"keypress",
			function (e) {
				if (e.key === "Enter" || e.key === " ") {
					hamburgerMenu();
				}
			}
		);

		function hamburgerMenu() {
			document.body.classList.toggle( "hide" );
			menuCloseBtn.classList.toggle( "visible" );

			if (primaryMenu.className == "header-menu") {
				primaryMenu.className         = "sidebar-menu";
				tempClassMobileMenu           = headerMenuContainer.className;
				headerMenuContainer.className = "header-menu-container";
				trapFocus( ".mobile-menu-container" );
			} else {
				primaryMenu.className         = "header-menu";
				headerMenuContainer.className = tempClassMobileMenu;
				tempClassMobileMenu           = "";
				hamburgerBtn.focus();
			}
		}

		function trapFocus(ele, focusEle = 0) {
			const matches = document
				.querySelector( ele )
				.querySelectorAll( "a, input, button" );

			let firstElement = matches[0];
			let lastElement  = matches[matches.length - 1];

			matches[focusEle].focus();

			lastElement.addEventListener(
				"keydown",
				function (e) {
					if (e.key == "Tab" && ! e.shiftKey) {
						e.preventDefault();
						firstElement.focus();
					}
				}
			);

			firstElement.addEventListener(
				"keydown",
				function (e) {
					if (e.key == "Tab" && e.shiftKey) {
						e.preventDefault();
						lastElement.focus();
					}
				}
			);
		}

		const subMenuDropDownBtns = document.querySelectorAll( ".drawer-dropdown-button" );
		subMenuDropDownBtns.forEach(
			function (el) {
				el.addEventListener(
					"click",
					function (event) {
						this.parentNode.querySelector( ".sub-menu" ).classList.toggle( "visible" );
						el.classList.toggle( "active" );
					}
				);
			}
		);

		subMenuDropDownBtns.forEach( onBlurCall );

		function onBlurCall(dropDownBtn, index) {
			dropDownBtn.parentNode
				.querySelectorAll(
					".sub-menu > li:last-child > a, .sub-menu > li > .drawer-dropdown-button"
				)
				.forEach(
					function (ele) {
						ele.addEventListener(
							"blur",
							function (event) {
								if ( ! dropDownBtn.parentNode.contains( event.relatedTarget ) && primaryMenu.className == "header-menu") {
									dropDownBtn.parentNode
										.querySelectorAll( ".sub-menu" )
										.forEach( elem1 => elem1.classList.remove( "visible" ) );
									subMenuDropDownBtns.forEach(
										submenu1 =>
										submenu1.classList.remove( "active" )
									);
								}
							}
						);
					}
				);
		}
	}
);
