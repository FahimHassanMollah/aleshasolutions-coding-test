"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_components_products_CategoryProducts_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/products/CategoryProducts.vue?vue&type=script&lang=js&":
/*!********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/products/CategoryProducts.vue?vue&type=script&lang=js& ***!
  \********************************************************************************************************************************************************************************************************************************/
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
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  name: 'CategoryProducts',
  props: ['slug', 'category'],
  data: function data() {
    return {
      products: [],
      categories: []
    };
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
  },
  mounted: function mounted() {
    var _this = this;

    this.products = this.$store.state.products;
    this.products = this.$store.state.categories;
    this.products.filter(function (product) {
      product.category_id.includes(_this.category.id);
    });
    console.log(this.products);
    console.log(this.category.id);
  }
});

/***/ }),

/***/ "./resources/js/components/products/CategoryProducts.vue":
/*!***************************************************************!*\
  !*** ./resources/js/components/products/CategoryProducts.vue ***!
  \***************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _CategoryProducts_vue_vue_type_template_id_d68d009c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./CategoryProducts.vue?vue&type=template&id=d68d009c& */ "./resources/js/components/products/CategoryProducts.vue?vue&type=template&id=d68d009c&");
/* harmony import */ var _CategoryProducts_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./CategoryProducts.vue?vue&type=script&lang=js& */ "./resources/js/components/products/CategoryProducts.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _CategoryProducts_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _CategoryProducts_vue_vue_type_template_id_d68d009c___WEBPACK_IMPORTED_MODULE_0__.render,
  _CategoryProducts_vue_vue_type_template_id_d68d009c___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/products/CategoryProducts.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/components/products/CategoryProducts.vue?vue&type=script&lang=js&":
/*!****************************************************************************************!*\
  !*** ./resources/js/components/products/CategoryProducts.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_CategoryProducts_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./CategoryProducts.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/products/CategoryProducts.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_CategoryProducts_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/components/products/CategoryProducts.vue?vue&type=template&id=d68d009c&":
/*!**********************************************************************************************!*\
  !*** ./resources/js/components/products/CategoryProducts.vue?vue&type=template&id=d68d009c& ***!
  \**********************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CategoryProducts_vue_vue_type_template_id_d68d009c___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CategoryProducts_vue_vue_type_template_id_d68d009c___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CategoryProducts_vue_vue_type_template_id_d68d009c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./CategoryProducts.vue?vue&type=template&id=d68d009c& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/products/CategoryProducts.vue?vue&type=template&id=d68d009c&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/products/CategoryProducts.vue?vue&type=template&id=d68d009c&":
/*!*************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/products/CategoryProducts.vue?vue&type=template&id=d68d009c& ***!
  \*************************************************************************************************************************************************************************************************************************************/
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
      _c(
        "div",
        {
          staticClass:
            "col s12 m3 l3 pr-0 hide-on-med-and-down animate fadeLeft categories"
        },
        [
          _c("div", { staticClass: "card" }, [
            _c("div", { staticClass: "card-content" }, [
              _c("span", { staticClass: "card-title" }, [_vm._v("Categories")]),
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
                              "router-link",
                              {
                                attrs: {
                                  to: {
                                    name: "categories.products",
                                    params: {
                                      slug: category.slug,
                                      category: category
                                    }
                                  }
                                }
                              },
                              [_vm._v(_vm._s(category.name))]
                            ),
                            _vm._v(" "),
                            _vm._l(category.child_categories, function(
                              childCategory
                            ) {
                              return category.child_categories
                                ? _c("ul", { key: childCategory.id }, [
                                    _c(
                                      "li",
                                      [
                                        _c(
                                          "router-link",
                                          {
                                            attrs: {
                                              to: {
                                                name: "categories.products",
                                                params: {
                                                  slug: childCategory.slug,
                                                  category: childCategory
                                                }
                                              }
                                            }
                                          },
                                          [
                                            _vm._v(
                                              " " +
                                                _vm._s(
                                                  "-- " + childCategory.name
                                                )
                                            )
                                          ]
                                        ),
                                        _vm._v(" "),
                                        _vm._l(
                                          childCategory.child_categories,
                                          function(childChildCategory) {
                                            return childCategory.child_categories
                                              ? _c(
                                                  "ul",
                                                  {
                                                    key: childChildCategory.id
                                                  },
                                                  [
                                                    _c(
                                                      "li",
                                                      [
                                                        _c(
                                                          "router-link",
                                                          {
                                                            attrs: {
                                                              to: {
                                                                name:
                                                                  "categories.products",
                                                                params: {
                                                                  slug:
                                                                    childChildCategory.slug,
                                                                  category: childChildCategory
                                                                }
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
                                                      ],
                                                      1
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
                                : _vm._e()
                            })
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
                      _c("product-index-categories"),
                      _vm._v(" "),
                      _vm.products.length
                        ? _c(
                            "div",
                            { staticClass: "col s12 m12 l9 pr-0" },
                            _vm._l(_vm.products, function(product) {
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
                                                    "\n                                                        View\n                                                    "
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
                    ],
                    1
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



/***/ })

}]);