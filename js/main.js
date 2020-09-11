/**
 * File main.js.
 *
 * Contains events and methods to handle menus and sidebars.
 *
 * @package aaurora
 */

document.addEventListener(
	"DOMContentLoaded",
	function(event) {
		const menuBtn        = document.querySelector( ".menu-btn" );
		const menu           = document.querySelector( ".menu" );
		const header         = document.querySelector( "header" );
		const hamburgerBtn   = document.querySelector( ".sidebar-open" );
		const aside          = document.querySelector( "aside" );
		const menuCloseBtn   = document.querySelector( ".sidebar-close" );
		const sidebarOverlay = document.querySelector( ".sidebar-overlay" );

		const searchField = document.querySelector( ".search-field" );

		const subMenu = document.querySelectorAll( ".sidebar-menu  .sub-menu" );

		subMenu.forEach(
			el =>
			el.insertAdjacentHTML( 'beforebegin', '<span class="sub-menu-btn-icon">&gt;</span>' )
		);

		const sidebarMenu = Array.prototype.slice.call( document.querySelectorAll( ".widget-area .sub-menu-btn-icon" ) );

		sidebarMenu.forEach(
			function(el) {
				el.addEventListener(
					"click",
					function(event) {
						this.parentNode.querySelector( ".sub-menu" ).classList.toggle( "display-block" );
						el.classList.toggle( "active" );
					}
				)
			}
		);

		menuBtn.addEventListener(
			"click",
			function() {
				menuBtn.classList.toggle( "open" );
				menu.classList.toggle( "open" );
				header.classList.toggle( "open" );
			}
		);

		hamburgerBtn.addEventListener(
			"click",
			function() {
				searchField.focus();
				aside.classList.toggle( "open" );
				sidebarOverlay.classList.toggle( "open" );
			}
		);

		menuCloseBtn.addEventListener(
			"click",
			function() {
				hamburgerBtn.focus();
				aside.classList.toggle( "open" );
				sidebarOverlay.classList.toggle( "open" );
			}
		);

		sidebarOverlay.addEventListener(
			"click",
			function() {
				aside.classList.toggle( "open" );
				sidebarOverlay.classList.toggle( "open" );
			}
		);
	}
);
