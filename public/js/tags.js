/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	// The require scope
/******/ 	var __webpack_require__ = {};
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/tags.js ***!
  \******************************/
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

/**
 * Bootstrap 5 tags
 *
 * Turns your select[multiple] into nice tags lists
 *
 * Required Bootstrap 5 styles:
 * - badge
 * - background-color utility
 * - margin-end utility
 * - forms
 * - dropdown
 */
var ACTIVE_CLASS = "bg-light";
var VALUE_ATTRIBUTE = "data-value";

var Tags = /*#__PURE__*/function () {
  /**
   * @param {HTMLSelectElement} selectElement
   */
  function Tags(selectElement) {
    _classCallCheck(this, Tags);

    this.selectElement = selectElement;
    this.selectElement.style.display = "none";
    this.placeholder = this.getPlaceholder();
    this.allowNew = selectElement.dataset.allowNew ? true : false; // Create elements

    this.holderElement = document.createElement("div");
    this.containerElement = document.createElement("div");
    this.dropElement = document.createElement("ul");
    this.searchInput = document.createElement("input");
    this.holderElement.appendChild(this.containerElement);
    this.containerElement.appendChild(this.searchInput);
    this.holderElement.appendChild(this.dropElement); // insert after

    this.selectElement.parentNode.insertBefore(this.holderElement, this.selectElement.nextSibling); // Configure them

    this.configureSearchInput();
    this.configureHolderElement();
    this.configureDropElement();
    this.configureContainerElement();
    this.buildSuggestions();
  }
  /**
   * Attach to all elements matched by the selector
   * @param {string} selector
   */


  _createClass(Tags, [{
    key: "getPlaceholder",
    value:
    /**
     * @returns {string}
     */
    function getPlaceholder() {
      var firstOption = this.selectElement.querySelector("option");

      if (!firstOption) {
        return;
      }

      if (!firstOption.value) {
        var placeholder = firstOption.innerText;
        firstOption.remove();
        return placeholder;
      }

      if (this.selectElement.getAttribute("placeholder")) {
        return this.selectElement.getAttribute("placeholder");
      }

      if (this.selectElement.getAttribute("data-placeholder")) {
        return this.selectElement.getAttribute("data-placeholder");
      }

      return "";
    }
  }, {
    key: "configureDropElement",
    value: function configureDropElement() {
      this.dropElement.classList.add("dropdown-menu");
    }
  }, {
    key: "configureHolderElement",
    value: function configureHolderElement() {
      this.holderElement.classList.add("form-control");
      this.holderElement.classList.add("dropdown");
    }
  }, {
    key: "configureContainerElement",
    value: function configureContainerElement() {
      var _this = this;

      this.containerElement.addEventListener("click", function (event) {
        _this.searchInput.focus();
      }); // add initial values

      var initialValues = this.selectElement.querySelectorAll("option[selected]");

      for (var j = 0; j < initialValues.length; j++) {
        var initialValue = initialValues[j];

        if (!initialValue.value) {
          continue;
        }

        this.addItem(initialValue.innerText, initialValue.value);
      }
    }
  }, {
    key: "configureSearchInput",
    value: function configureSearchInput() {
      var _this2 = this;

      this.searchInput.type = "text";
      this.searchInput.autocomplete = false;
      this.searchInput.style.border = 0;
      this.searchInput.style.outline = 0;
      this.searchInput.style.maxWidth = "100%";
      this.adjustWidth();
      this.searchInput.addEventListener("input", function (event) {
        _this2.adjustWidth();

        if (_this2.searchInput.value.length >= 1) {
          _this2.showSuggestions();
        } else {
          _this2.hideSuggestions();
        }
      }); // keypress doesn't send arrow keys

      this.searchInput.addEventListener("keydown", function (event) {
        if (event.code == "Enter" || event.code == "NumpadEnter") {
          var selection = _this2.getActiveSelection();

          if (selection) {
            _this2.addItem(selection.innerText, selection.getAttribute(VALUE_ATTRIBUTE));

            _this2.resetSearchInput();

            _this2.hideSuggestions();
          } else {
            // We use what is typed
            if (_this2.allowNew) {
              _this2.addItem(_this2.searchInput.value);

              _this2.resetSearchInput();

              _this2.hideSuggestions();
            }
          }

          event.preventDefault();
          return;
        }

        if (event.code == "ArrowUp") {
          _this2.moveSelectionUp();
        }

        if (event.code == "ArrowDown") {
          _this2.moveSelectionDown();
        }

        if (event.code == "Backspace") {
          if (_this2.searchInput.value.length == 0) {
            _this2.removeLastItem();

            _this2.adjustWidth();
          }
        }
      });
    }
  }, {
    key: "moveSelectionUp",
    value: function moveSelectionUp() {
      var active = this.getActiveSelection();

      if (active) {
        var prev = active.parentNode;

        do {
          prev = prev.previousSibling;
        } while (prev && prev.style.display == "none");

        if (!prev) {
          return;
        }

        active.classList.remove(ACTIVE_CLASS);
        prev.querySelector("a").classList.add(ACTIVE_CLASS);
      }
    }
  }, {
    key: "moveSelectionDown",
    value: function moveSelectionDown() {
      var active = this.getActiveSelection();

      if (active) {
        var next = active.parentNode;

        do {
          next = next.nextSibling;
        } while (next && next.style.display == "none");

        if (!next) {
          return;
        }

        active.classList.remove(ACTIVE_CLASS);
        next.querySelector("a").classList.add(ACTIVE_CLASS);
      }
    }
    /**
     * Adjust the field to fit its content
     */

  }, {
    key: "adjustWidth",
    value: function adjustWidth() {
      if (this.searchInput.value) {
        this.searchInput.size = this.searchInput.value.length + 1;
      } else {
        // Show the placeholder only if empty
        if (this.getSelectedValues().length) {
          this.searchInput.placeholder = "";
          this.searchInput.size = 1;
        } else {
          this.searchInput.size = this.placeholder.length;
          this.searchInput.placeholder = this.placeholder;
        }
      }
    }
    /**
     * Add suggestions from element
     */

  }, {
    key: "buildSuggestions",
    value: function buildSuggestions() {
      var _this3 = this;

      var options = this.selectElement.querySelectorAll("option");

      var _loop = function _loop(i) {
        var opt = options[i];

        if (!opt.getAttribute("value")) {
          return "continue";
        }

        var newChild = document.createElement("li");
        var newChildLink = document.createElement("a");
        newChild.append(newChildLink);
        newChildLink.classList.add("dropdown-item");
        newChildLink.setAttribute(VALUE_ATTRIBUTE, opt.getAttribute("value"));
        newChildLink.setAttribute("href", "#");
        newChildLink.innerText = opt.innerText;

        _this3.dropElement.appendChild(newChild); // Hover sets active item


        newChildLink.addEventListener("mouseenter", function (event) {
          _this3.removeActiveSelection();

          newChild.querySelector("a").classList.add(ACTIVE_CLASS);
        });
        newChildLink.addEventListener("click", function (event) {
          event.preventDefault();

          _this3.addItem(newChildLink.innerText, newChildLink.getAttribute(VALUE_ATTRIBUTE));

          _this3.resetSearchInput();

          _this3.hideSuggestions();
        });
      };

      for (var i = 0; i < options.length; i++) {
        var _ret = _loop(i);

        if (_ret === "continue") continue;
      }
    }
  }, {
    key: "resetSearchInput",
    value: function resetSearchInput() {
      this.searchInput.value = "";
      this.adjustWidth();
    }
    /**
     * @returns {array}
     */

  }, {
    key: "getSelectedValues",
    value: function getSelectedValues() {
      var selected = this.selectElement.querySelectorAll("option:checked");
      return Array.from(selected).map(function (el) {
        return el.value;
      });
    }
    /**
     * The element create with buildSuggestions
     */

  }, {
    key: "showSuggestions",
    value: function showSuggestions() {
      if (!this.dropElement.classList.contains("show")) {
        this.dropElement.classList.add("show");
      } // Position next to search input


      this.dropElement.style.left = this.searchInput.offsetLeft + "px"; // Get search value

      var search = this.searchInput.value.toLocaleLowerCase(); // Get current values

      var values = this.getSelectedValues(); // Filter the list according to search string

      var list = this.dropElement.querySelectorAll("li");
      var found = false;
      var firstItem = null;

      for (var i = 0; i < list.length; i++) {
        var item = list[i];
        var text = item.innerText.toLocaleLowerCase();
        var link = item.querySelector("a"); // Remove previous selection

        link.classList.remove(ACTIVE_CLASS); // Hide selected values

        if (values.indexOf(link.getAttribute(VALUE_ATTRIBUTE)) != -1) {
          item.style.display = "none";
          continue;
        }

        if (text.indexOf(search) !== -1) {
          item.style.display = "list-item";
          found = true;

          if (!firstItem) {
            firstItem = item;
          }
        } else {
          item.style.display = "none";
        }
      } // Special case if nothing matches


      if (!found) {
        this.dropElement.classList.remove("show");
      } // Always select first item


      if (firstItem) {
        if (this.holderElement.classList.contains("is-invalid")) {
          this.holderElement.classList.remove("is-invalid");
        }

        firstItem.querySelector("a").classList.add(ACTIVE_CLASS);
      } else {
        // No item and we don't allow new items => error
        if (!this.allowNew) {
          this.holderElement.classList.add("is-invalid");
        }
      }
    }
    /**
     * The element create with buildSuggestions
     */

  }, {
    key: "hideSuggestions",
    value: function hideSuggestions(dropEl) {
      if (this.dropElement.classList.contains("show")) {
        this.dropElement.classList.remove("show");
      }

      if (this.holderElement.classList.contains("is-invalid")) {
        this.holderElement.classList.remove("is-invalid");
      }
    }
    /**
     * @returns {HTMLElement}
     */

  }, {
    key: "getActiveSelection",
    value: function getActiveSelection() {
      return this.dropElement.querySelector("a." + ACTIVE_CLASS);
    }
  }, {
    key: "removeActiveSelection",
    value: function removeActiveSelection() {
      var selection = this.getActiveSelection();

      if (selection) {
        selection.classList.remove(ACTIVE_CLASS);
      }
    }
  }, {
    key: "removeLastItem",
    value: function removeLastItem() {
      var items = this.containerElement.querySelectorAll("span");

      if (!items.length) {
        return;
      }

      var lastItem = items[items.length - 1];
      this.removeItem(lastItem.getAttribute(VALUE_ATTRIBUTE));
    }
    /**
     * @param {string} text
     * @param {string} value
     */

  }, {
    key: "addItem",
    value: function addItem(text, value) {
      if (!value) {
        value = text;
      }

      var span = document.createElement("span");
      span.classList.add("badge");
      span.classList.add("bg-primary");
      span.classList.add("me-2");
      span.setAttribute(VALUE_ATTRIBUTE, value);
      span.innerText = text;
      this.containerElement.insertBefore(span, this.searchInput); // update select

      var opt = this.selectElement.querySelector('option[value="' + value + '"]');

      if (opt) {
        opt.setAttribute("selected", "selected");
      } else {
        // we need to create a new option
        opt = document.createElement("option");
        opt.value = value;
        opt.innerText = text;
        opt.setAttribute("selected", "selected");
        this.selectElement.appendChild(opt);
      }
    }
    /**
     * @param {string} value
     */

  }, {
    key: "removeItem",
    value: function removeItem(value) {
      var item = this.containerElement.querySelector("span[" + VALUE_ATTRIBUTE + '="' + value + '"]');

      if (!item) {
        return;
      }

      item.remove(); // update select

      var opt = this.selectElement.querySelector('option[value="' + value + '"]');

      if (opt) {
        opt.removeAttribute("selected");
      }
    }
  }], [{
    key: "init",
    value: function init() {
      var selector = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : "select[multiple]";
      var list = document.querySelectorAll(selector);

      for (var i = 0; i < list.length; i++) {
        var el = list[i];
        var inst = new Tags(el);
      }
    }
  }]);

  return Tags;
}();

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Tags);
/******/ })()
;