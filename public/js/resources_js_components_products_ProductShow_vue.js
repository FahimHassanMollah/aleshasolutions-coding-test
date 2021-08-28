"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_components_products_ProductShow_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/products/ProductShow.vue?vue&type=script&lang=js&":
/*!***************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/products/ProductShow.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  computed: {
    products: function products() {
      return this.$store.state.products;
    },
    product: function product() {
      var _this = this;

      return this.products.find(function (product) {
        return product.slug === _this.$route.params.slug;
      });
    }
  },
  methods: {
    hasImage: function hasImage(image) {
      if (image) {
        return "/storage/" + image[0];
      }

      return '/app-assets/images/gallery/no-image.png';
    },
    checkProductIsInCart: function checkProductIsInCart(productId) {
      var hasProduct = this.$store.state.cart.find(function (product) {
        return product.id === productId;
      });

      if (hasProduct) {
        return "disabled";
      }
    }
  }
});

/***/ }),

/***/ "./resources/js/components/products/ProductShow.vue":
/*!**********************************************************!*\
  !*** ./resources/js/components/products/ProductShow.vue ***!
  \**********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _ProductShow_vue_vue_type_template_id_5a89308c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ProductShow.vue?vue&type=template&id=5a89308c& */ "./resources/js/components/products/ProductShow.vue?vue&type=template&id=5a89308c&");
/* harmony import */ var _ProductShow_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ProductShow.vue?vue&type=script&lang=js& */ "./resources/js/components/products/ProductShow.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _ProductShow_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _ProductShow_vue_vue_type_template_id_5a89308c___WEBPACK_IMPORTED_MODULE_0__.render,
  _ProductShow_vue_vue_type_template_id_5a89308c___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/products/ProductShow.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/components/products/ProductShow.vue?vue&type=script&lang=js&":
/*!***********************************************************************************!*\
  !*** ./resources/js/components/products/ProductShow.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductShow_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./ProductShow.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/products/ProductShow.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductShow_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/components/products/ProductShow.vue?vue&type=template&id=5a89308c&":
/*!*****************************************************************************************!*\
  !*** ./resources/js/components/products/ProductShow.vue?vue&type=template&id=5a89308c& ***!
  \*****************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductShow_vue_vue_type_template_id_5a89308c___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductShow_vue_vue_type_template_id_5a89308c___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductShow_vue_vue_type_template_id_5a89308c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./ProductShow.vue?vue&type=template&id=5a89308c& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/products/ProductShow.vue?vue&type=template&id=5a89308c&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/products/ProductShow.vue?vue&type=template&id=5a89308c&":
/*!********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/products/ProductShow.vue?vue&type=template&id=5a89308c& ***!
  \********************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render),
/* harmony export */   "staticRenderFns": () => (/* binding */ staticRenderFns)
/* harmony export */ });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    [
      _c("header-nav"),
      _vm._v(" "),
      _c("div", { attrs: { id: "main" } }, [
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col s12" }, [
            _c(
              "div",
              {
                staticClass: "container",
                staticStyle: { "min-height": "70vh" }
              },
              [
                _c("div", { staticClass: "section" }, [
                  _c(
                    "div",
                    { staticClass: "row", attrs: { id: "ecommerce-products" } },
                    [
                      _vm.products.length
                        ? _c("div", { staticClass: "col s12 m12 pr-0" }, [
                            _c("div", { staticClass: "col s12" }, [
                              _c(
                                "div",
                                { staticClass: "card animate fadeUp" },
                                [
                                  _c("div", { staticClass: "card-content" }, [
                                    _c(
                                      "div",
                                      {
                                        staticClass: "row",
                                        attrs: { id: "product-four" }
                                      },
                                      [
                                        _c(
                                          "div",
                                          { staticClass: "col m6 s12" },
                                          [
                                            _c("img", {
                                              staticClass: "responsive-img",
                                              attrs: {
                                                src: _vm.hasImage(
                                                  _vm.product.image
                                                ),
                                                alt: _vm.product.name
                                              }
                                            })
                                          ]
                                        ),
                                        _vm._v(" "),
                                        _c(
                                          "div",
                                          { staticClass: "col m6 s12" },
                                          [
                                            _c("h5", [
                                              _vm._v(_vm._s(_vm.product.name))
                                            ]),
                                            _vm._v(" "),
                                            _c(
                                              "span",
                                              {
                                                staticClass:
                                                  "new badge left ml-0 mr-2",
                                                attrs: {
                                                  "data-badge-caption": ""
                                                }
                                              },
                                              [_vm._v("4.2 Star")]
                                            ),
                                            _vm._v(" "),
                                            _vm._m(0),
                                            _vm._v(" "),
                                            _c("hr", { staticClass: "mb-5" }),
                                            _vm._v(" "),
                                            _c("h6", [
                                              _vm._v("Product Description")
                                            ]),
                                            _vm._v(" "),
                                            _c("div", {
                                              domProps: {
                                                innerHTML: _vm._s(
                                                  _vm.product.description
                                                )
                                              }
                                            }),
                                            _vm._v(" "),
                                            _c(
                                              "h5",
                                              { staticClass: "red-text" },
                                              [
                                                _vm._v(
                                                  "Only at $" +
                                                    _vm._s(
                                                      _vm.product.price.toFixed(
                                                        2
                                                      )
                                                    )
                                                )
                                              ]
                                            ),
                                            _vm._v(" "),
                                            _c(
                                              "a",
                                              {
                                                staticClass:
                                                  "waves-effect waves-light btn gradient-45deg-deep-purple-blue z-depth-4 mt-2 mr-2",
                                                class: _vm.checkProductIsInCart(
                                                  _vm.product.id
                                                ),
                                                on: {
                                                  click: function($event) {
                                                    return _vm.$store.commit(
                                                      "addToCart",
                                                      _vm.product
                                                    )
                                                  }
                                                }
                                              },
                                              [
                                                _vm._v(
                                                  "ADD TO\n                                                        CART"
                                                )
                                              ]
                                            ),
                                            _vm._v(" "),
                                            _c(
                                              "router-link",
                                              {
                                                staticClass:
                                                  "waves-effect waves-light btn gradient-45deg-purple-deep-orange z-depth-4 mt-2",
                                                attrs: {
                                                  to: { name: "products.index" }
                                                }
                                              },
                                              [_vm._v("Continue Shopping")]
                                            )
                                          ],
                                          1
                                        )
                                      ]
                                    )
                                  ])
                                ]
                              )
                            ])
                          ])
                        : _c("div", { staticClass: "col s12 m12 pr-0" }, [
                            _vm._m(1)
                          ])
                    ]
                  )
                ])
              ]
            ),
            _vm._v(" "),
            _c("div", { staticClass: "content-overlay" })
          ])
        ])
      ]),
      _vm._v(" "),
      _c("footer-section")
    ],
    1
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("p", [
      _vm._v("Availability: "),
      _c("span", { staticClass: "green-text" }, [_vm._v("Available")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col s12 m12 l12" }, [
      _c("div", { staticClass: "card animate fadeLeft" }, [
        _c("div", { staticClass: "card-content" }, [
          _c("h6", { staticClass: "center" }, [_vm._v("No Product Found!")])
        ])
      ])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js":
/*!********************************************************************!*\
  !*** ./node_modules/vue-loader/lib/runtime/componentNormalizer.js ***!
  \********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ normalizeComponent)
/* harmony export */ });
/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file (except for modules).
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

function normalizeComponent (
  scriptExports,
  render,
  staticRenderFns,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier, /* server only */
  shadowMode /* vue-cli only */
) {
  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (render) {
    options.render = render
    options.staticRenderFns = staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = 'data-v-' + scopeId
  }

  var hook
  if (moduleIdentifier) { // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = shadowMode
      ? function () {
        injectStyles.call(
          this,
          (options.functional ? this.parent : this).$root.$options.shadowRoot
        )
      }
      : injectStyles
  }

  if (hook) {
    if (options.functional) {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functional component in vue file
      var originalRender = options.render
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return originalRender(h, context)
      }
    } else {
      // inject component registration as beforeCreate hook
      var existing = options.beforeCreate
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    }
  }

  return {
    exports: scriptExports,
    options: options
  }
}


/***/ })

}]);