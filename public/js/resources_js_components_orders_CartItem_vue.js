"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_components_orders_CartItem_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/orders/CartItem.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/orders/CartItem.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************************************************************************************************************************/
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
  data: function data() {
    return {
      cart: [],
      discount: 0.00,
      deliveryCharge: 60.00
    };
  },
  methods: {
    decreaseCartProductQuantity: function decreaseCartProductQuantity(product) {
      this.$store.commit('decreaseCartProductQuantity', product);
      this.initCart();
    },
    increaseCartProductQuantity: function increaseCartProductQuantity(product) {
      this.$store.commit('addToCart', product);
      this.initCart();
    },
    initCart: function initCart() {
      this.cart = [];
      this.cart = this.$store.state.cart;
    },
    calculateSubtotal: function calculateSubtotal() {
      var subtotal = 0.00;
      this.cart.forEach(function (product) {
        subtotal += product.quantity * product.price;
      });
      return subtotal;
    },
    invoiceTotal: function invoiceTotal() {
      var total = 0.00;
      return total + this.calculateSubtotal() + this.deliveryCharge + this.discount;
    }
  },
  mounted: function mounted() {
    this.cart = this.$store.state.cart;
  }
});

/***/ }),

/***/ "./resources/js/components/orders/CartItem.vue":
/*!*****************************************************!*\
  !*** ./resources/js/components/orders/CartItem.vue ***!
  \*****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _CartItem_vue_vue_type_template_id_e06b073c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./CartItem.vue?vue&type=template&id=e06b073c& */ "./resources/js/components/orders/CartItem.vue?vue&type=template&id=e06b073c&");
/* harmony import */ var _CartItem_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./CartItem.vue?vue&type=script&lang=js& */ "./resources/js/components/orders/CartItem.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _CartItem_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _CartItem_vue_vue_type_template_id_e06b073c___WEBPACK_IMPORTED_MODULE_0__.render,
  _CartItem_vue_vue_type_template_id_e06b073c___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/orders/CartItem.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/components/orders/CartItem.vue?vue&type=script&lang=js&":
/*!******************************************************************************!*\
  !*** ./resources/js/components/orders/CartItem.vue?vue&type=script&lang=js& ***!
  \******************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_CartItem_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./CartItem.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/orders/CartItem.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_CartItem_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/components/orders/CartItem.vue?vue&type=template&id=e06b073c&":
/*!************************************************************************************!*\
  !*** ./resources/js/components/orders/CartItem.vue?vue&type=template&id=e06b073c& ***!
  \************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CartItem_vue_vue_type_template_id_e06b073c___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CartItem_vue_vue_type_template_id_e06b073c___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CartItem_vue_vue_type_template_id_e06b073c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./CartItem.vue?vue&type=template&id=e06b073c& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/orders/CartItem.vue?vue&type=template&id=e06b073c&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/orders/CartItem.vue?vue&type=template&id=e06b073c&":
/*!***************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/orders/CartItem.vue?vue&type=template&id=e06b073c& ***!
  \***************************************************************************************************************************************************************************************************************************/
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
                      _c("div", { staticClass: "col s12 pr-0" }, [
                        _c(
                          "div",
                          { staticClass: "row" },
                          [
                            _c(
                              "router-link",
                              {
                                staticClass:
                                  "right waves-effect waves-light gradient-45deg-deep-blue btn z-depth-4",
                                attrs: { to: { name: "products.index" } }
                              },
                              [_vm._v("Continue Shopping")]
                            )
                          ],
                          1
                        ),
                        _vm._v(" "),
                        _c("div", { staticClass: "card animate fadeLeft" }, [
                          _c("div", { staticClass: "card-content" }, [
                            _c("h5", [
                              _vm._v(
                                "My Cart (" + _vm._s(_vm.cart.length) + ")"
                              )
                            ]),
                            _vm._v(" "),
                            !_vm.cart.length
                              ? _c("div", { staticClass: "row center-align" }, [
                                  _vm._m(0)
                                ])
                              : _c("div", { staticClass: "row" }, [
                                  _c(
                                    "table",
                                    { staticClass: "striped responsive-table" },
                                    [
                                      _vm._m(1),
                                      _vm._v(" "),
                                      _c(
                                        "tbody",
                                        _vm._l(_vm.cart, function(
                                          product,
                                          index
                                        ) {
                                          return _c("tr", { key: product.id }, [
                                            _c("td", [
                                              _c("span", [
                                                _vm._v(_vm._s(product.name))
                                              ])
                                            ]),
                                            _vm._v(" "),
                                            _c("td", [
                                              _vm._v(
                                                _vm._s(product.price.toFixed(2))
                                              )
                                            ]),
                                            _vm._v(" "),
                                            _c(
                                              "td",
                                              {
                                                staticClass:
                                                  "center-align valign-wrapper"
                                              },
                                              [
                                                _c(
                                                  "i",
                                                  {
                                                    staticClass:
                                                      "material-icons",
                                                    attrs: {
                                                      title: "subtract"
                                                    },
                                                    on: {
                                                      click: function($event) {
                                                        return _vm.decreaseCartProductQuantity(
                                                          product
                                                        )
                                                      }
                                                    }
                                                  },
                                                  [
                                                    _vm._v(
                                                      "keyboard_arrow_left"
                                                    )
                                                  ]
                                                ),
                                                _vm._v(" "),
                                                _c("span", [
                                                  _vm._v(
                                                    _vm._s(
                                                      _vm.cart[index].quantity
                                                    )
                                                  )
                                                ]),
                                                _vm._v(" "),
                                                _c(
                                                  "i",
                                                  {
                                                    staticClass:
                                                      "material-icons",
                                                    attrs: { title: "add" },
                                                    on: {
                                                      click: function($event) {
                                                        return _vm.increaseCartProductQuantity(
                                                          product
                                                        )
                                                      }
                                                    }
                                                  },
                                                  [
                                                    _vm._v(
                                                      "keyboard_arrow_right"
                                                    )
                                                  ]
                                                )
                                              ]
                                            ),
                                            _vm._v(" "),
                                            _c(
                                              "td",
                                              {
                                                staticClass:
                                                  "indigo-text right-align"
                                              },
                                              [
                                                _vm._v(
                                                  _vm._s(
                                                    _vm.cart[index].quantity *
                                                      product.price
                                                  )
                                                )
                                              ]
                                            )
                                          ])
                                        }),
                                        0
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c("div", {
                                    staticClass: "divider mt-3 mb-3"
                                  }),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    { staticClass: "invoice-subtotal" },
                                    [
                                      _c("div", { staticClass: "row" }, [
                                        _vm._m(2),
                                        _vm._v(" "),
                                        _c(
                                          "div",
                                          {
                                            staticClass:
                                              "col xl4 m7 s12 offset-xl3"
                                          },
                                          [
                                            _c("ul", [
                                              _c(
                                                "li",
                                                {
                                                  staticClass:
                                                    "display-flex justify-content-between"
                                                },
                                                [
                                                  _c(
                                                    "span",
                                                    {
                                                      staticClass:
                                                        "invoice-subtotal-title"
                                                    },
                                                    [_vm._v("Subtotal")]
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "h6",
                                                    {
                                                      staticClass:
                                                        "invoice-subtotal-value"
                                                    },
                                                    [
                                                      _vm._v(
                                                        "$" +
                                                          _vm._s(
                                                            _vm
                                                              .calculateSubtotal()
                                                              .toFixed(2)
                                                          )
                                                      )
                                                    ]
                                                  )
                                                ]
                                              ),
                                              _vm._v(" "),
                                              _c(
                                                "li",
                                                {
                                                  staticClass:
                                                    "display-flex justify-content-between"
                                                },
                                                [
                                                  _c(
                                                    "span",
                                                    {
                                                      staticClass:
                                                        "invoice-subtotal-title"
                                                    },
                                                    [_vm._v("Discount")]
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "h6",
                                                    {
                                                      staticClass:
                                                        "invoice-subtotal-value"
                                                    },
                                                    [
                                                      _vm._v(
                                                        "- $ " +
                                                          _vm._s(
                                                            _vm.discount.toFixed(
                                                              2
                                                            )
                                                          )
                                                      )
                                                    ]
                                                  )
                                                ]
                                              ),
                                              _vm._v(" "),
                                              _c(
                                                "li",
                                                {
                                                  staticClass:
                                                    "display-flex justify-content-between"
                                                },
                                                [
                                                  _c(
                                                    "span",
                                                    {
                                                      staticClass:
                                                        "invoice-subtotal-title"
                                                    },
                                                    [_vm._v("Delivery Charge:")]
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "h6",
                                                    {
                                                      staticClass:
                                                        "invoice-subtotal-value"
                                                    },
                                                    [
                                                      _vm._v(
                                                        "$ " +
                                                          _vm._s(
                                                            _vm.deliveryCharge.toFixed(
                                                              2
                                                            )
                                                          )
                                                      )
                                                    ]
                                                  )
                                                ]
                                              ),
                                              _vm._v(" "),
                                              _c("li", {
                                                staticClass: "divider mt-2 mb-2"
                                              }),
                                              _vm._v(" "),
                                              _c(
                                                "li",
                                                {
                                                  staticClass:
                                                    "display-flex justify-content-between"
                                                },
                                                [
                                                  _c(
                                                    "span",
                                                    {
                                                      staticClass:
                                                        "invoice-subtotal-title"
                                                    },
                                                    [_vm._v("Invoice Total")]
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "h6",
                                                    {
                                                      staticClass:
                                                        "invoice-subtotal-value"
                                                    },
                                                    [
                                                      _vm._v(
                                                        "$ " +
                                                          _vm._s(
                                                            _vm
                                                              .invoiceTotal()
                                                              .toFixed(2)
                                                          )
                                                      )
                                                    ]
                                                  )
                                                ]
                                              ),
                                              _vm._v(" "),
                                              _c("li", {
                                                staticClass: "divider mt-2 mb-2"
                                              }),
                                              _vm._v(" "),
                                              _c(
                                                "li",
                                                {
                                                  staticClass:
                                                    "display-flex justify-content-between"
                                                },
                                                [
                                                  _c(
                                                    "router-link",
                                                    {
                                                      staticClass:
                                                        "btn btn-light-indigo waves-effect waves-ligh",
                                                      attrs: {
                                                        to: {
                                                          name:
                                                            "orders.checkout"
                                                        }
                                                      }
                                                    },
                                                    [
                                                      _vm._v(
                                                        "Proceed to checkout"
                                                      )
                                                    ]
                                                  )
                                                ],
                                                1
                                              )
                                            ])
                                          ]
                                        )
                                      ])
                                    ]
                                  )
                                ])
                          ])
                        ])
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
    return _c("div", [
      _c("h5", [_c("span", [_vm._v("Cart is empty!")])]),
      _vm._v(" "),
      _c("i", { staticClass: "material-icons" }, [
        _vm._v("sentiment_dissatisfied")
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("thead", [
      _c("tr", [
        _c("th", [_vm._v("Item")]),
        _vm._v(" "),
        _c("th", [_vm._v("Price")]),
        _vm._v(" "),
        _c("th", [_vm._v("Qty")]),
        _vm._v(" "),
        _c("th", { staticClass: "right-align" }, [_vm._v("Price")])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col m5 s12" }, [
      _c("p", [_vm._v("Thank you for using our site. ")])
    ])
  }
]
render._withStripped = true



/***/ })

}]);