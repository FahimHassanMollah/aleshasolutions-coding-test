"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_components_orders_CheckoutOrder_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/orders/CheckoutOrder.vue?vue&type=script&lang=js&":
/*!***************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/orders/CheckoutOrder.vue?vue&type=script&lang=js& ***!
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
  name: "CheckoutOrder",
  data: function data() {
    return {
      cart: [],
      customer: {
        name: '',
        email: '',
        phone: '',
        address: ''
      },
      orderDetails: {
        shippingMethod: '',
        paymentMethod: '',
        additionalNote: '',
        subtotal: 0.00,
        discount: 0.00,
        deliveryCharge: 60.00,
        total: 0.00
      },
      nameError: false,
      emailError: false,
      phoneError: false,
      addressError: false,
      shippingMethodError: false,
      paymentMethodErrors: false
    };
  },
  methods: {
    productImage: function productImage(image) {
      if (image) {
        return "/storage/" + image[0];
      }

      return '/app-assets/images/gallery/no-image.png';
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
      return total + this.calculateSubtotal() + this.orderDetails.deliveryCharge + this.orderDetails.discount;
    },
    checkDeliveryCharge: function checkDeliveryCharge(type) {
      if (type == 'restaurant') {
        this.orderDetails.deliveryCharge = 0.00;
        this.orderDetails.total = this.invoiceTotal();
        return;
      }

      this.orderDetails.deliveryCharge = 60.00;
      this.orderDetails.total = this.invoiceTotal();
      return;
    },
    checkInputs: function checkInputs() {
      if (!this.customer.name) {
        this.nameError = true;
      } else {
        this.nameError = false;
      }

      if (!this.customer.email) {
        this.emailError = true;
      } else {
        this.emailError = false;
      }

      if (!this.customer.phone) {
        this.phoneError = true;
      } else {
        this.phoneError = false;
      }

      if (!this.customer.address) {
        this.addressError = true;
      } else {
        this.addressError = false;
      }

      if (this.orderDetails.paymentMethod == '') {
        this.paymentMethodErrors = true;
      } else {
        this.paymentMethodErrors = false;
      }

      if (this.orderDetails.shippingMethod == '') {
        this.shippingMethodError = true;
      } else {
        this.shippingMethodError = false;
      }
    },
    confirmOrder: function confirmOrder() {
      var _this = this;

      this.checkInputs();

      if (!this.nameError && !this.emailError && !this.phoneError && !this.addressError && !this.paymentMethodErrors && !this.shippingMethodError) {
        axios.post('/api/v1/orders/', {
          cart: this.$store.state.cart,
          order_details: this.orderDetails,
          customer: this.customer
        }).then(function (response) {
          if (response.data.status == 'success') {
            _this.$store.dispatch('clearCart');

            _this.$router.push({
              name: 'orders.thank-you',
              params: {
                success: true
              }
            });
          }
        })["catch"](function (error) {
          console.error(error);
        });
      }
    }
  },
  mounted: function mounted() {
    this.cart = this.$store.state.cart;
    this.orderDetails.subtotal = this.calculateSubtotal();
    this.orderDetails.total = this.invoiceTotal();
  }
});

/***/ }),

/***/ "./resources/js/components/orders/CheckoutOrder.vue":
/*!**********************************************************!*\
  !*** ./resources/js/components/orders/CheckoutOrder.vue ***!
  \**********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _CheckoutOrder_vue_vue_type_template_id_1d58f5a9___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./CheckoutOrder.vue?vue&type=template&id=1d58f5a9& */ "./resources/js/components/orders/CheckoutOrder.vue?vue&type=template&id=1d58f5a9&");
/* harmony import */ var _CheckoutOrder_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./CheckoutOrder.vue?vue&type=script&lang=js& */ "./resources/js/components/orders/CheckoutOrder.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _CheckoutOrder_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _CheckoutOrder_vue_vue_type_template_id_1d58f5a9___WEBPACK_IMPORTED_MODULE_0__.render,
  _CheckoutOrder_vue_vue_type_template_id_1d58f5a9___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/orders/CheckoutOrder.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/components/orders/CheckoutOrder.vue?vue&type=script&lang=js&":
/*!***********************************************************************************!*\
  !*** ./resources/js/components/orders/CheckoutOrder.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_CheckoutOrder_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./CheckoutOrder.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/orders/CheckoutOrder.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_CheckoutOrder_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/components/orders/CheckoutOrder.vue?vue&type=template&id=1d58f5a9&":
/*!*****************************************************************************************!*\
  !*** ./resources/js/components/orders/CheckoutOrder.vue?vue&type=template&id=1d58f5a9& ***!
  \*****************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CheckoutOrder_vue_vue_type_template_id_1d58f5a9___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CheckoutOrder_vue_vue_type_template_id_1d58f5a9___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CheckoutOrder_vue_vue_type_template_id_1d58f5a9___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./CheckoutOrder.vue?vue&type=template&id=1d58f5a9& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/orders/CheckoutOrder.vue?vue&type=template&id=1d58f5a9&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/orders/CheckoutOrder.vue?vue&type=template&id=1d58f5a9&":
/*!********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/orders/CheckoutOrder.vue?vue&type=template&id=1d58f5a9& ***!
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
                  !_vm.cart.length
                    ? _c("div", { staticClass: "row center-align" }, [
                        _c(
                          "div",
                          [
                            _vm._m(0),
                            _vm._v(" "),
                            _c("i", { staticClass: "material-icons" }, [
                              _vm._v("sentiment_dissatisfied")
                            ]),
                            _vm._v(" "),
                            _c("br"),
                            _vm._v(" "),
                            _c(
                              "router-link",
                              {
                                staticClass: "btn btn-small",
                                attrs: { to: { name: "products.index" } }
                              },
                              [_vm._v("Continue Shopping")]
                            )
                          ],
                          1
                        )
                      ])
                    : _c("div", { staticClass: "row animate fadeLeft" }, [
                        _c("div", { staticClass: "col s4" }, [
                          _c(
                            "div",
                            {
                              staticClass: "card-panel",
                              staticStyle: { "min-height": "70vh" }
                            },
                            [
                              _c("h6", [_vm._v("Customer Info")]),
                              _vm._v(" "),
                              _c("div", { staticClass: "row" }, [
                                _c(
                                  "div",
                                  { staticClass: "input-field col s12" },
                                  [
                                    _c("input", {
                                      directives: [
                                        {
                                          name: "model",
                                          rawName: "v-model",
                                          value: _vm.customer.name,
                                          expression: "customer.name"
                                        }
                                      ],
                                      staticClass: "validate",
                                      attrs: {
                                        id: "name",
                                        name: "name",
                                        type: "text"
                                      },
                                      domProps: { value: _vm.customer.name },
                                      on: {
                                        input: function($event) {
                                          if ($event.target.composing) {
                                            return
                                          }
                                          _vm.$set(
                                            _vm.customer,
                                            "name",
                                            $event.target.value
                                          )
                                        }
                                      }
                                    }),
                                    _vm._v(" "),
                                    _c("label", { attrs: { for: "name" } }, [
                                      _vm._v("Name")
                                    ]),
                                    _vm._v(" "),
                                    _vm.nameError
                                      ? _c(
                                          "span",
                                          { staticClass: "red-text" },
                                          [_vm._v("Name field is required.")]
                                        )
                                      : _vm._e()
                                  ]
                                )
                              ]),
                              _vm._v(" "),
                              _c("div", { staticClass: "row" }, [
                                _c(
                                  "div",
                                  { staticClass: "input-field col s12" },
                                  [
                                    _c("input", {
                                      directives: [
                                        {
                                          name: "model",
                                          rawName: "v-model",
                                          value: _vm.customer.email,
                                          expression: "customer.email"
                                        }
                                      ],
                                      staticClass: "validate",
                                      attrs: {
                                        id: "email",
                                        name: "email",
                                        type: "text"
                                      },
                                      domProps: { value: _vm.customer.email },
                                      on: {
                                        input: function($event) {
                                          if ($event.target.composing) {
                                            return
                                          }
                                          _vm.$set(
                                            _vm.customer,
                                            "email",
                                            $event.target.value
                                          )
                                        }
                                      }
                                    }),
                                    _vm._v(" "),
                                    _c("label", { attrs: { for: "email" } }, [
                                      _vm._v("Email")
                                    ]),
                                    _vm._v(" "),
                                    _vm.emailError
                                      ? _c(
                                          "span",
                                          { staticClass: "red-text" },
                                          [_vm._v("Email field is required.")]
                                        )
                                      : _vm._e()
                                  ]
                                )
                              ]),
                              _vm._v(" "),
                              _c("div", { staticClass: "row" }, [
                                _c(
                                  "div",
                                  { staticClass: "input-field col s12" },
                                  [
                                    _c("input", {
                                      directives: [
                                        {
                                          name: "model",
                                          rawName: "v-model",
                                          value: _vm.customer.phone,
                                          expression: "customer.phone"
                                        }
                                      ],
                                      staticClass: "validate",
                                      attrs: {
                                        id: "phone",
                                        name: "phone",
                                        type: "text"
                                      },
                                      domProps: { value: _vm.customer.phone },
                                      on: {
                                        input: function($event) {
                                          if ($event.target.composing) {
                                            return
                                          }
                                          _vm.$set(
                                            _vm.customer,
                                            "phone",
                                            $event.target.value
                                          )
                                        }
                                      }
                                    }),
                                    _vm._v(" "),
                                    _c("label", { attrs: { for: "phone" } }, [
                                      _vm._v("Phone")
                                    ]),
                                    _vm._v(" "),
                                    _vm.phoneError
                                      ? _c(
                                          "span",
                                          { staticClass: "red-text" },
                                          [_vm._v("Phone field is required.")]
                                        )
                                      : _vm._e()
                                  ]
                                )
                              ]),
                              _vm._v(" "),
                              _c("div", { staticClass: "row" }, [
                                _c(
                                  "div",
                                  { staticClass: "input-field col s12" },
                                  [
                                    _c(
                                      "textarea",
                                      {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value: _vm.customer.address,
                                            expression: "customer.address"
                                          }
                                        ],
                                        staticClass: "materialize-textarea",
                                        attrs: {
                                          id: "address",
                                          name: "address"
                                        },
                                        domProps: {
                                          value: _vm.customer.address
                                        },
                                        on: {
                                          input: function($event) {
                                            if ($event.target.composing) {
                                              return
                                            }
                                            _vm.$set(
                                              _vm.customer,
                                              "address",
                                              $event.target.value
                                            )
                                          }
                                        }
                                      },
                                      [_vm._v(_vm._s(_vm.customer.address))]
                                    ),
                                    _vm._v(" "),
                                    _c("label", { attrs: { for: "address" } }, [
                                      _vm._v("Address")
                                    ]),
                                    _vm._v(" "),
                                    _vm.addressError
                                      ? _c(
                                          "span",
                                          { staticClass: "red-text" },
                                          [_vm._v("Address field is required.")]
                                        )
                                      : _vm._e()
                                  ]
                                )
                              ])
                            ]
                          )
                        ]),
                        _vm._v(" "),
                        _c("div", { staticClass: "col s4" }, [
                          _c(
                            "div",
                            {
                              staticClass: "card-panel",
                              staticStyle: { "min-height": "70vh" }
                            },
                            [
                              _c("h6", [_vm._v("Shipping Method")]),
                              _vm._v(" "),
                              _vm.shippingMethodError
                                ? _c("span", { staticClass: "red-text" }, [
                                    _vm._v("Please Select a shipping method")
                                  ])
                                : _vm._e(),
                              _vm._v(" "),
                              _c("p", [
                                _c("label", [
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.orderDetails.shippingMethod,
                                        expression:
                                          "orderDetails.shippingMethod"
                                      }
                                    ],
                                    staticClass: "with-gap",
                                    attrs: {
                                      name: "shipping",
                                      value: "home",
                                      type: "radio",
                                      checked: ""
                                    },
                                    domProps: {
                                      checked: _vm._q(
                                        _vm.orderDetails.shippingMethod,
                                        "home"
                                      )
                                    },
                                    on: {
                                      click: function($event) {
                                        return _vm.checkDeliveryCharge("home")
                                      },
                                      change: function($event) {
                                        return _vm.$set(
                                          _vm.orderDetails,
                                          "shippingMethod",
                                          "home"
                                        )
                                      }
                                    }
                                  }),
                                  _vm._v(" "),
                                  _c("span", [
                                    _vm._v("Home Delivery (within 2 hours)")
                                  ])
                                ])
                              ]),
                              _vm._v(" "),
                              _c("p", [
                                _c("label", [
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.orderDetails.shippingMethod,
                                        expression:
                                          "orderDetails.shippingMethod"
                                      }
                                    ],
                                    staticClass: "with-gap",
                                    attrs: {
                                      name: "shipping",
                                      value: "restaurant",
                                      type: "radio"
                                    },
                                    domProps: {
                                      checked: _vm._q(
                                        _vm.orderDetails.shippingMethod,
                                        "restaurant"
                                      )
                                    },
                                    on: {
                                      click: function($event) {
                                        return _vm.checkDeliveryCharge(
                                          "restaurant"
                                        )
                                      },
                                      change: function($event) {
                                        return _vm.$set(
                                          _vm.orderDetails,
                                          "shippingMethod",
                                          "restaurant"
                                        )
                                      }
                                    }
                                  }),
                                  _vm._v(" "),
                                  _c("span", [_vm._v("Restaurant Pickup")])
                                ])
                              ]),
                              _vm._v(" "),
                              _c("h6", [_vm._v("Payment Method")]),
                              _vm._v(" "),
                              _vm.paymentMethodErrors
                                ? _c("span", { staticClass: "red-text" }, [
                                    _vm._v("Please Select a Payment method")
                                  ])
                                : _vm._e(),
                              _vm._v(" "),
                              _c("p", [
                                _c("label", [
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.orderDetails.paymentMethod,
                                        expression: "orderDetails.paymentMethod"
                                      }
                                    ],
                                    staticClass: "with-gap",
                                    attrs: {
                                      name: "payment",
                                      value: "cash",
                                      type: "radio",
                                      checked: ""
                                    },
                                    domProps: {
                                      checked: _vm._q(
                                        _vm.orderDetails.paymentMethod,
                                        "cash"
                                      )
                                    },
                                    on: {
                                      change: function($event) {
                                        return _vm.$set(
                                          _vm.orderDetails,
                                          "paymentMethod",
                                          "cash"
                                        )
                                      }
                                    }
                                  }),
                                  _vm._v(" "),
                                  _c("span", [_vm._v("Cash Payment")])
                                ])
                              ]),
                              _vm._v(" "),
                              _c("p", [
                                _c("label", [
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.orderDetails.paymentMethod,
                                        expression: "orderDetails.paymentMethod"
                                      }
                                    ],
                                    attrs: {
                                      name: "payment",
                                      value: "card",
                                      type: "radio",
                                      disabled: "disabled"
                                    },
                                    domProps: {
                                      checked: _vm._q(
                                        _vm.orderDetails.paymentMethod,
                                        "card"
                                      )
                                    },
                                    on: {
                                      change: function($event) {
                                        return _vm.$set(
                                          _vm.orderDetails,
                                          "paymentMethod",
                                          "card"
                                        )
                                      }
                                    }
                                  }),
                                  _vm._v(" "),
                                  _c("span", [_vm._v("Card Payment")])
                                ])
                              ]),
                              _vm._v(" "),
                              _c("div", { staticClass: "row" }, [
                                _c(
                                  "div",
                                  { staticClass: "input-field col s12" },
                                  [
                                    _c(
                                      "textarea",
                                      {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value:
                                              _vm.orderDetails.additionalNote,
                                            expression:
                                              "orderDetails.additionalNote"
                                          }
                                        ],
                                        staticClass: "materialize-textarea",
                                        attrs: {
                                          name: "additional_note",
                                          id: "note",
                                          row: "6"
                                        },
                                        domProps: {
                                          value: _vm.orderDetails.additionalNote
                                        },
                                        on: {
                                          input: function($event) {
                                            if ($event.target.composing) {
                                              return
                                            }
                                            _vm.$set(
                                              _vm.orderDetails,
                                              "additionalNote",
                                              $event.target.value
                                            )
                                          }
                                        }
                                      },
                                      [
                                        _vm._v(
                                          _vm._s(
                                            _vm.orderDetails.additionalNote
                                          )
                                        )
                                      ]
                                    ),
                                    _vm._v(" "),
                                    _c("label", { attrs: { for: "note" } }, [
                                      _vm._v("Additional Note")
                                    ])
                                  ]
                                )
                              ])
                            ]
                          )
                        ]),
                        _vm._v(" "),
                        _c("div", { staticClass: "col s4" }, [
                          _c(
                            "div",
                            {
                              staticClass: "card-panel",
                              staticStyle: { "min-height": "70vh" }
                            },
                            [
                              _c("h6", [_vm._v("Order Summery")]),
                              _vm._v(" "),
                              _c("div", { staticClass: "row" }, [
                                _c("div", { staticClass: "col s12" }, [
                                  _c(
                                    "ul",
                                    _vm._l(_vm.$store.state.cart, function(
                                      product
                                    ) {
                                      return _c(
                                        "li",
                                        {
                                          key: product.id,
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
                                            [
                                              _c("img", {
                                                staticClass: "responsive-img",
                                                attrs: {
                                                  src: _vm.productImage(
                                                    product.image
                                                  ),
                                                  alt: "",
                                                  width: "30px",
                                                  height: "30px"
                                                }
                                              })
                                            ]
                                          ),
                                          _vm._v(" "),
                                          _c("span", [
                                            _vm._v(
                                              _vm._s(
                                                product.name.substring(0, 6) +
                                                  " ..."
                                              )
                                            )
                                          ]),
                                          _vm._v(" "),
                                          _c("span", [
                                            _vm._v(_vm._s(product.quantity))
                                          ]),
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
                                                    (
                                                      product.price *
                                                      product.quantity
                                                    ).toFixed(2)
                                                  )
                                              )
                                            ]
                                          )
                                        ]
                                      )
                                    }),
                                    0
                                  ),
                                  _vm._v(" "),
                                  _c("ul", [
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
                                                  _vm.orderDetails.subtotal.toFixed(
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
                                                  _vm.orderDetails.discount.toFixed(
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
                                          [_vm._v("Delivery Charge")]
                                        ),
                                        _vm._v(" "),
                                        _c(
                                          "h6",
                                          {
                                            staticClass:
                                              "invoice-subtotal-value",
                                            model: {
                                              value:
                                                _vm.orderDetails.deliveryCharge,
                                              callback: function($$v) {
                                                _vm.$set(
                                                  _vm.orderDetails,
                                                  "deliveryCharge",
                                                  $$v
                                                )
                                              },
                                              expression:
                                                "orderDetails.deliveryCharge"
                                            }
                                          },
                                          [
                                            _vm._v(
                                              "$ " +
                                                _vm._s(
                                                  _vm.orderDetails.deliveryCharge.toFixed(
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
                                              "invoice-subtotal-value",
                                            model: {
                                              value: _vm.orderDetails.total,
                                              callback: function($$v) {
                                                _vm.$set(
                                                  _vm.orderDetails,
                                                  "total",
                                                  $$v
                                                )
                                              },
                                              expression: "orderDetails.total"
                                            }
                                          },
                                          [
                                            _vm._v(
                                              "$ " +
                                                _vm._s(
                                                  _vm.orderDetails.total.toFixed(
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
                                          "button",
                                          {
                                            staticClass:
                                              "btn btn-block btn-light-indigo waves-effect waves-ligh",
                                            on: { click: _vm.confirmOrder }
                                          },
                                          [_vm._v("Confirm Order")]
                                        )
                                      ]
                                    )
                                  ])
                                ])
                              ])
                            ]
                          )
                        ])
                      ])
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
    return _c("h5", [_c("span", [_vm._v("Cart is empty!")])])
  }
]
render._withStripped = true



/***/ })

}]);