/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
    var listmode_primary_container, listmode_primary_button, listmode_primary_menu, listmode_primary_links, listmode_primary_i, listmode_primary_len;

    listmode_primary_container = document.getElementById( 'listmode-primary-navigation' );
    if ( ! listmode_primary_container ) {
        return;
    }

    listmode_primary_button = listmode_primary_container.getElementsByTagName( 'button' )[0];
    if ( 'undefined' === typeof listmode_primary_button ) {
        return;
    }

    listmode_primary_menu = listmode_primary_container.getElementsByTagName( 'ul' )[0];

    // Hide menu toggle button if menu is empty and return early.
    if ( 'undefined' === typeof listmode_primary_menu ) {
        listmode_primary_button.style.display = 'none';
        return;
    }

    listmode_primary_menu.setAttribute( 'aria-expanded', 'false' );
    if ( -1 === listmode_primary_menu.className.indexOf( 'nav-menu' ) ) {
        listmode_primary_menu.className += ' nav-menu';
    }

    listmode_primary_button.onclick = function() {
        if ( -1 !== listmode_primary_container.className.indexOf( 'listmode-toggled' ) ) {
            listmode_primary_container.className = listmode_primary_container.className.replace( ' listmode-toggled', '' );
            listmode_primary_button.setAttribute( 'aria-expanded', 'false' );
            listmode_primary_menu.setAttribute( 'aria-expanded', 'false' );
        } else {
            listmode_primary_container.className += ' listmode-toggled';
            listmode_primary_button.setAttribute( 'aria-expanded', 'true' );
            listmode_primary_menu.setAttribute( 'aria-expanded', 'true' );
        }
    };

    // Get all the link elements within the menu.
    listmode_primary_links    = listmode_primary_menu.getElementsByTagName( 'a' );

    // Each time a menu link is focused or blurred, toggle focus.
    for ( listmode_primary_i = 0, listmode_primary_len = listmode_primary_links.length; listmode_primary_i < listmode_primary_len; listmode_primary_i++ ) {
        listmode_primary_links[listmode_primary_i].addEventListener( 'focus', listmode_primary_toggleFocus, true );
        listmode_primary_links[listmode_primary_i].addEventListener( 'blur', listmode_primary_toggleFocus, true );
    }

    /**
     * Sets or removes .focus class on an element.
     */
    function listmode_primary_toggleFocus() {
        var self = this;

        // Move up through the ancestors of the current link until we hit .nav-menu.
        while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

            // On li elements toggle the class .focus.
            if ( 'li' === self.tagName.toLowerCase() ) {
                if ( -1 !== self.className.indexOf( 'listmode-focus' ) ) {
                    self.className = self.className.replace( ' listmode-focus', '' );
                } else {
                    self.className += ' listmode-focus';
                }
            }

            self = self.parentElement;
        }
    }

    /**
     * Toggles `focus` class to allow submenu access on tablets.
     */
    ( function( listmode_primary_container ) {
        var touchStartFn, listmode_primary_i,
            parentLink = listmode_primary_container.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

        if ( 'ontouchstart' in window ) {
            touchStartFn = function( e ) {
                var menuItem = this.parentNode, listmode_primary_i;

                if ( ! menuItem.classList.contains( 'listmode-focus' ) ) {
                    e.preventDefault();
                    for ( listmode_primary_i = 0; listmode_primary_i < menuItem.parentNode.children.length; ++listmode_primary_i ) {
                        if ( menuItem === menuItem.parentNode.children[listmode_primary_i] ) {
                            continue;
                        }
                        menuItem.parentNode.children[listmode_primary_i].classList.remove( 'listmode-focus' );
                    }
                    menuItem.classList.add( 'listmode-focus' );
                } else {
                    menuItem.classList.remove( 'listmode-focus' );
                }
            };

            for ( listmode_primary_i = 0; listmode_primary_i < parentLink.length; ++listmode_primary_i ) {
                parentLink[listmode_primary_i].addEventListener( 'touchstart', touchStartFn, false );
            }
        }
    }( listmode_primary_container ) );
} )();