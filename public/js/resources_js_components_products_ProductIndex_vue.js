"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_components_products_ProductIndex_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/products/ProductIndex.vue?vue&type=script&lang=js&":
/*!****************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/products/ProductIndex.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************************************************************************************************************************************************/
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
    categories: function categories() {
      return this.$store.state.categories;
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
    },
    filterProductByCategory: function filterProductByCategory(slug) {
      var _this = this;

      axios.get('/api/v1/categories/' + slug).then(function (response) {
        _this.$store.commit('updateProducts', response.data.data);
      })["catch"](function (error) {
        console.log(error);
      });
    },
    getAllProducts: function getAllProducts() {
      var _this2 = this;

      axios.get('/api/v1/products').then(function (response) {
        _this2.$store.commit('updateProducts', response.data.data);
      })["catch"](function (error) {
        console.log(error);
      });
    }
  }
});

/***/ }),

/***/ "./resources/js/components/products/ProductIndex.vue":
/*!***********************************************************!*\
  !*** ./resources/js/components/products/ProductIndex.vue ***!
  \***********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _ProductIndex_vue_vue_type_template_id_3a8de7d3___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ProductIndex.vue?vue&type=template&id=3a8de7d3& */ "./resources/js/components/products/ProductIndex.vue?vue&type=template&id=3a8de7d3&");
/* harmony import */ var _ProductIndex_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ProductIndex.vue?vue&type=script&lang=js& */ "./resources/js/components/products/ProductIndex.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _ProductIndex_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _ProductIndex_vue_vue_type_template_id_3a8de7d3___WEBPACK_IMPORTED_MODULE_0__.render,
  _ProductIndex_vue_vue_type_template_id_3a8de7d3___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/products/ProductIndex.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/components/products/ProductIndex.vue?vue&type=script&lang=js&":
/*!************************************************************************************!*\
  !*** ./resources/js/components/products/ProductIndex.vue?vue&type=script&lang=js& ***!
  \************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductIndex_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./ProductIndex.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/products/ProductIndex.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductIndex_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/components/products/ProductIndex.vue?vue&type=template&id=3a8de7d3&":
/*!******************************************************************************************!*\
  !*** ./resources/js/components/products/ProductIndex.vue?vue&type=template&id=3a8de7d3& ***!
  \******************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductIndex_vue_vue_type_template_id_3a8de7d3___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductIndex_vue_vue_type_template_id_3a8de7d3___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductIndex_vue_vue_type_template_id_3a8de7d3___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./ProductIndex.vue?vue&type=template&id=3a8de7d3& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/products/ProductIndex.vue?vue&type=template&id=3a8de7d3&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/products/ProductIndex.vue?vue&type=template&id=3a8de7d3&":
/*!*********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/products/ProductIndex.vue?vue&type=template&id=3a8de7d3& ***!
  \*********************************************************************************************************************************************************************************************************************************/
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
                      _c(
                        "div",
                        {
                          staticClass:
                            "col s12 m3 l3 pr-0 hide-on-med-and-down animate fadeLeft categories"
                        },
                        [
                          _c("div", { staticClass: "card" }, [
                            _c("div", { staticClass: "card-content" }, [
                              _c("span", { staticClass: "card-title" }, [
                                _vm._v("Categories")
                              ]),
                              _vm._v(" "),
                              _c(
                                "a",
                                {
                                  attrs: { href: "#" },
                                  on: { click: _vm.getAllProducts }
                                },
                                [_vm._v("All Categories")]
                              ),
                              _vm._v(" "),
                              _c("hr", { staticClass: "p-0 mb-10" }),
                              _vm._v(" "),
                              _vm.categories.length
                                ? _c(
                                    "div",
                                    _vm._l(_vm.categories, function(category) {
                                      return _c("ul", { key: category.id }, [
                                        _c(
                                          "li",
                                          [
                                            _c(
                                              "a",
                                              {
                                                attrs: { href: "#" },
                                                on: {
                                                  click: function($event) {
                                                    return _vm.filterProductByCategory(
                                                      category.slug
                                                    )
                                                  }
                                                }
                                              },
                                              [_vm._v(_vm._s(category.name))]
                                            ),
                                            _vm._v(" "),
                                            _vm._l(
                                              category.child_categories,
                                              function(childCategory) {
                                                return category.child_categories
                                                  ? _c(
                                                      "ul",
                                                      { key: childCategory.id },
                                                      [
                                                        _c(
                                                          "li",
                                                          [
                                                            _c(
                                                              "a",
                                                              {
                                                                attrs: {
                                                                  href: "#"
                                                                },
                                                                on: {
                                                                  click: function(
                                                                    $event
                                                                  ) {
                                                                    return _vm.filterProductByCategory(
                                                                      childCategory.slug
                                                                    )
                                                                  }
                                                                }
                                                              },
                                                              [
                                                                _vm._v(
                                                                  " " +
                                                                    _vm._s(
                                                                      "-- " +
                                                                        childCategory.name
                                                                    )
                                                                )
                                                              ]
                                                            ),
                                                            _vm._v(" "),
                                                            _vm._l(
                                                              childCategory.child_categories,
                                                              function(
                                                                childChildCategory
                                                              ) {
                                                                return childCategory.child_categories
                                                                  ? _c(
                                                                      "ul",
                                                                      {
                                                                        key:
                                                                          childChildCategory.id
                                                                      },
                                                                      [
                                                                        _c(
                                                                          "li",
                                                                          [
                                                                            _c(
                                                                              "a",
                                                                              {
                                                                                attrs: {
                                                                                  href:
                                                                                    "#"
                                                                                },
                                                                                on: {
                                                                                  click: function(
                                                                                    $event
                                                                                  ) {
                                                                                    return _vm.filterProductByCategory(
                                                                                      childChildCategory.slug
                                                                                    )
                                                                                  }
                                                                                }
                                                                              },
                                                                              [
                                                                                _vm._v(
                                                                                  "   " +
                                                                                    _vm._s(
                                                                                      "-- --" +
                                                                                        childChildCategory.name
                                                                                    )
                                                                                )
                                                                              ]
                                                                            )
                                                                          ]
                                                                        )
                                                                      ]
                                                                    )
                                                                  : _vm._e()
                                                              }
                                                            )
                                                          ],
                                                          2
                                                        )
                                                      ]
                                                    )
                                                  : _vm._e()
                                              }
                                            )
                                          ],
                                          2
                                        )
                                      ])
                                    }),
                                    0
                                  )
                                : _c("div", [_vm._v("No Category Found.")])
                            ])
                          ])
                        ]
                      ),
                      _vm._v(" "),
                      _vm.$store.state.products.length
                        ? _c(
                            "div",
                            { staticClass: "col s12 m12 l9 pr-0" },
                            _vm._l(_vm.$store.state.products, function(
                              product
                            ) {
                              return _c("div", { key: product.id }, [
                                _c("div", { staticClass: "col s12 m4 l4" }, [
                                  _c(
                                    "div",
                                    { staticClass: "card animate fadeLeft" },
                                    [
                                      _c(
                                        "div",
                                        { staticClass: "card-content" },
                                        [
                                          _c(
                                            "p",
                                            {
                                              staticClass:
                                                "card-title text-ellipsis"
                                            },
                                            [_vm._v(_vm._s(product.name))]
                                          ),
                                          _vm._v(" "),
                                          _c("img", {
                                            staticClass:
                                              "center responsive-img",
                                            attrs: {
                                              src: _vm.hasImage(product.image),
                                              alt: ""
                                            }
                                          }),
                                          _vm._v(" "),
                                          _c(
                                            "div",
                                            {
                                              staticClass:
                                                "display-flex flex-wrap justify-content-center"
                                            },
                                            [
                                              _c(
                                                "h5",
                                                { staticClass: "mt-3" },
                                                [
                                                  _vm._v(
                                                    "$" +
                                                      _vm._s(
                                                        product.price.toFixed(2)
                                                      )
                                                  )
                                                ]
                                              ),
                                              _vm._v(" "),
                                              _c(
                                                "router-link",
                                                {
                                                  staticClass:
                                                    "mt-2 waves-effect waves-light gradient-45deg-deep-purple-blue btn btn-block modal-trigger z-depth-4",
                                                  attrs: {
                                                    to: {
                                                      name: "products.show",
                                                      params: {
                                                        slug: product.slug
                                                      }
                                                    }
                                                  }
                                                },
                                                [
                                                  _vm._v(
                                                    "\n                                                            View\n                                                        "
                                                  )
                                                ]
                                              ),
                                              _vm._v(" "),
                                              _c(
                                                "a",
                                                {
                                                  staticClass:
                                                    "mt-2 waves-effect waves-light gradient-45deg-deep-blue btn  modal-trigger z-depth-4",
                                                  class: _vm.checkProductIsInCart(
                                                    product.id
                                                  ),
                                                  on: {
                                                    click: function($event) {
                                                      return _vm.$store.commit(
                                                        "addToCart",
                                                        product
                                                      )
                                                    }
                                                  }
                                                },
                                                [_vm._v("Add to Cart")]
                                              )
                                            ],
                                            1
                                          )
                                        ]
                                      )
                                    ]
                                  )
                                ])
                              ])
                            }),
                            0
                          )
                        : _c("div", { staticClass: "col s12 m12 l9 pr-0" }, [
                            _vm._m(0)
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