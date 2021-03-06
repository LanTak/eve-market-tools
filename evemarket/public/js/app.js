! function() {
	window.Dashboard = window.Dashboard || {}, Dashboard.Helpers = Dashboard.Helpers || {}, Dashboard.Helpers.isDefaultSidebar = function() {
		var a = document.querySelector("body"),
			e = !(a.classList.contains("sidebar-big-icons") || a.classList.contains("sidebar-slim"));
		return e
	}, Dashboard.Helpers.isSidebarBigIcons = function() {
		var a = document.querySelector("body");
		return a.classList.contains("sidebar-big-icons")
	}, Dashboard.Helpers.isFixedFooter = function() {
		var a = document.querySelector("body");
		return a.classList.contains("footer-fixed")
	}, Dashboard.Helpers.isFixedSidebar = function() {
		var a = document.querySelector("body");
		return a.classList.contains("sidebar-fixed")
	}, Dashboard.Helpers.isFixedNavbar = function() {
		var a = document.querySelector("body");
		return a.classList.contains("navbar-fixed")
	}, Dashboard.Helpers.isBoxedLayout = function() {
		var a = document.querySelector("body");
		return a.classList.contains("boxed-layout")
	}, Dashboard.Helpers.isRTL = function() {
		var a = document.querySelector("body");
		return a.classList.contains("rtl")
	}, Dashboard.Helpers.isFullHeightSidebar = function() {
		var a = document.querySelector("body");
		return a.classList.contains("sidebar-full-height")
	}, Dashboard.Helpers.isSidebarSlim = function() {
		var a = document.querySelector("body");
		return a.classList.contains("sidebar-slim")
	}, Dashboard.Helpers.isSidebarDisabled = function() {
		var a = document.querySelector("body");
		return a.classList.contains("sidebar-disabled")
	}, Dashboard.Helpers.calcElementsHeightSum = function(a) {
		var e = 0;
		return a.each(function() {
			e += $(this).outerHeight(!0)
		}), e
	}, Dashboard.Helpers.setAttributeChangeObserver = function(a, e) {
		var n = new MutationObserver(function(a) {
				a.forEach(function(a) {
					"class" === a.attributeName && e()
				})
			}),
			t = {
				attributes: !0
			};
		a.each(function() {
			n.observe(this, t)
		})
	}, Dashboard.Helpers.setFixedRelativeToElement = function(a, e, n) {
		a = a || $(), e = e || $();
		var t, i = e[0].getBoundingClientRect();
		if (n) {
			var r = $(window).width() - i.right;
			a.css({
				left: "auto",
				right: r + "px"
			})
		} else t = "left: {left}px; right: auto".replace("{left}", i.left.toString()), a.css("cssText", t)
	}, Dashboard.Helpers.elementExists = function(a, e) {
		var n = document.querySelector(a);
		n && e.call(n)
	}, Dashboard.Helpers.DeviceMediaQueries = {
		SCREEN_XS: "(max-width: 767px)",
		SCREEN_SM: "(min-width: 768px)",
		SCREEN_MD: "(min-width: 992px)",
		SCREEN_LG: "(min-width: 1200px)"
	}, Dashboard.Helpers.Colors = {
		grayBase: "#000",
		grayDarker: "#262626",
		grayDark: "#2d2d2d",
		gray: "#383838",
		grayLight: "#444444",
		grayLighter: "#5c5c5c",
		brandWhite: "white",
		brandPrimary: "#2c97de",
		brandSuccess: "#84b547",
		brandInfo: "#2dbda8",
		brandWarning: "#e76d3b",
		brandDanger: "#cc3e4a",
		brandCerulean: "#00A3E3",
		brandCuriousBlue: "#2986c7",
		brandEndaveour: "#0055a3",
		brandMinsk: "#362d88",
		brandEminence: "#742787",
		brandVioletEggplant: "#aa1985",
		brandMintGreen: "#72ff96",
		brandAquamarine: "#62ffe0",
		brandMalibu: "#6abfff",
		brandDodgerBlue: "#5e6cff",
		brandHeliotrope: "#a26bff",
		brandPerfume: "#f57ffe"
	}
}(),
function() {
	window.Dashboard = window.Dashboard || {};
	var a = "",
		e = "";
	Dashboard.LayoutControl = {
		$content: $(".content"),
		$footer: $("footer"),
		$navBar: $(".navigation .navbar"),
		$sideBar: $(".navigation .sidebar"),
		$window: $(window),
		setContentMinHeight: function(a) {
			a = a || 0;
			var e = this.$window.height(),
				n = this.$sideBar.outerHeight(!0) + a;
			if (e >= n) {
				var t = this.$footer.is(":visible") && !Dashboard.Helpers.isFixedFooter() ? this.$footer.height() : 0,
					i = this.$navBar.is(":visible") ? this.$navBar.height() : 0,
					r = "calc(100vh - {navfootHeight}px)".replace("{navfootHeight}", t + i);
				this.$content.css("minHeight", r)
			} else this.$content.css("minHeight", n)
		},
		initLayoutChangeEventEmitter: function() {
			var n = document.querySelector("body"),
				t = document.querySelector(".content > .container, .content > .container-fluid"),
				i = new MutationObserver(function(i) {
					i.forEach(function(i) {
						"class" === i.attributeName && (n.className === a && t.className === e || ($(window).trigger("layout-changed"), a = n.className, e = t.className))
					})
				});
			i.observe(n, {
				attributes: !0
			}), i.observe(t, {
				attributes: !0
			})
		},
		setFixedSidebarsRelativeToContent: function() {
			var a = Dashboard.Helpers.isBoxedLayout(),
				e = Dashboard.Helpers.isRTL(),
				n = $(".sidebar"),
				t = $(".right-sidebar");
			if (a) {
				var i = $(".main-wrap"),
					r = Dashboard.Helpers.isFixedSidebar();
				r ? Dashboard.Helpers.setFixedRelativeToElement(n, i, e) : n.css({
					left: "",
					right: ""
				}), Dashboard.Helpers.setFixedRelativeToElement(t, i, !e)
			} else n.add(t).css({
				left: "",
				right: ""
			})
		},
		setSidebarsStickyness: function() {
			var a = $(".sidebar, .right-sidebar"),
				e = $(".navbar");
			a.affix({
				offset: {
					top: e.outerHeight()
				}
			})
		}
	}, $(function() {
		a = document.querySelector("body").className, $('a[href="#"]').each(function() {
			$(this).prop("href", "javascript: void(0)")
		})
	})
}(),
function() {
	window.Dashboard = window.Dashboard || {};
	var a = new MobileDetect;
	Dashboard.Settings = Dashboard.Settings || {}, Dashboard.Settings.SidebarMenuAnimationDuration = 300, Dashboard.Settings.SidebarMenuAnimationEasing = "", Dashboard.Sidebar = {
		setSideSubmenusMinHeight: function() {},
		saveSidebarStartupClasses: function() {
			var a = "",
				e = $("body"),
				n = ["sidebar-slim", "sidebar-big-icons", "sidebar-overlay", "sidebar-disabled"];
			bodyClassList = e.prop("class").split(" "), bodyClassList.forEach(function(e) {
				n.indexOf(e) >= 0 && (a += e + " ")
			}), e.data("start-sidebar-classes", a)
		},
		setSidebarState: function() {
			var a = $("body"),
				e = a.data("start-sidebar-classes");
			e.indexOf("sidebar-disabled") >= 0 || (window.matchMedia(Dashboard.Helpers.DeviceMediaQueries.SCREEN_XS).matches && (a.removeClass("sidebar-slim " + e), a.addClass("sidebar-overlay")), window.matchMedia(Dashboard.Helpers.DeviceMediaQueries.SCREEN_SM).matches && (a.removeClass("sidebar-overlay " + e), a.addClass("sidebar-slim")), window.matchMedia(Dashboard.Helpers.DeviceMediaQueries.SCREEN_MD).matches && (a.removeClass("sidebar-overlay"), a.removeClass("sidebar-slim"), a.addClass(e)))
		},
		setupMenu: function(a) {
			function e(a) {
				for (var e = 0, n = a.parentElement;
					"LI" === n.nodeName || "UL" === n.nodeName;) "UL" === n.nodeName && e++, n = n.parentElement;
				return e
			}
			var n = a.find("li");
			n.each(function() {
				var n = $(this),
					t = n.find(">ul"),
					i = n.find(">a");
				if (t.length > 0) {
					if (n.parent()[0] === a[0]) {
						n.addClass("primary-submenu");
						var r = i.children(".nav-label");
						r && t.attr("data-submenu-title", r.text().trim())
					}
					n.addClass("has-submenu"), t.addClass("submenu-level-" + e(t[0]))
				}
			})
		},
		openOverlay: function() {
			var a = $(".sidebar"),
				e = $("body");
			e.hasClass("sidebar-overlay__open") || (e.addClass("sidebar-overlay__open"), a.velocity({
				left: [0, -a.width()]
			}, {
				duration: 200,
				easing: "ease-out"
			}))
		},
		closeOverlay: function() {
			var a = $(".sidebar"),
				e = $("body");
			e.hasClass("sidebar-overlay__open") && a.velocity({
				left: [-a.width(), 0]
			}, {
				duration: 200,
				easing: "ease-in",
				complete: function() {
					$("body").removeClass("sidebar-overlay__open"), a.css("left", "auto")
				}
			})
		},
		expandMenuToCurrentLink: function() {
			var a = Dashboard.Helpers.isDefaultSidebar(),
				e = Dashboard.Helpers.isSidebarSlim();
			$(".sidebar .expanded").removeClass("expanded");
			for (var n = $(".sidebar .side-menu li.active"), t = n;
				"LI" == t.prop("tagName") || "UL" == t.prop("tagName");) "LI" == t.prop("tagName") && ((a && !t.hasClass("side-menu") || !a && !e && !t.hasClass("primary-submenu")) && t.addClass("expanded"), t.addClass("nested-active")), t = t.parent()
		},
		setMenuTooltips: function(a) {
			Dashboard.Helpers.isSidebarSlim() ? a.find("> li:not(.has-submenu) a").tooltip({
				placement: "right",
				container: "body",
				trigger: "hover"
			}) : a.find("> li:not(.has-submenu) a").tooltip("destroy")
		},
		setMenuHandler: function(e) {
			function n() {
				if (!a.mobile()) {
					var e = Dashboard.Helpers.isDefaultSidebar();
					return !e
				}
				return !1
			}
			var t = e.find("li.has-submenu > a");
			t.on("click", function() {
				if (Dashboard.Helpers.isSidebarSlim()) return !1;
				var a = $(this),
					t = a.closest("li"),
					i = !!e.find(".velocity-animating").length;
				if (t.hasClass("primary-submenu") && n() || i) return !1;
				var r = t.closest("ul"),
					o = r.find("> li > ul"),
					s = t.find("> ul"),
					d = o.filter(function() {
						return this !== s[0]
					});
				if (t.hasClass("expanded")) {
					var l = parseInt(s.prop("scrollHeight"));
					s.velocity({
						height: [0, l]
					}, {
						duration: Dashboard.Settings.SidebarMenuAnimationDuration,
						easing: Dashboard.Settings.SidebarMenuAnimationEasing,
						complete: function() {
							s.closest("li").removeClass("expanded"), s.css("height", ""), Dashboard.LayoutControl.setContentMinHeight()
						}
					})
				} else {
					s.css("display", "block");
					var l = parseInt(s.prop("scrollHeight"));
					s.velocity({
						height: [l, 0]
					}, {
						display: "",
						duration: Dashboard.Settings.SidebarMenuAnimationDuration,
						easing: Dashboard.Settings.SidebarMenuAnimationEasing,
						complete: function() {
							s.css("height", ""), t.addClass("expanded")
						}
					});
					var c = d.filter(function() {
							return $(this).closest("li").hasClass("expanded")
						}),
						b = Dashboard.Helpers.calcElementsHeightSum(c);
					c.each(function() {
						var a = $(this);
						a.velocity({
							height: [0, a.prop("scrollHeight")]
						}, {
							duration: Dashboard.Settings.SidebarMenuAnimationDuration,
							easing: Dashboard.Settings.SidebarMenuAnimationEasing,
							complete: function() {
								a.closest("li").removeClass("expanded"), a.css("height", "")
							}
						})
					});
					var u = Dashboard.Helpers.isSidebarBigIcons() ? 0 : l - b;
					Dashboard.LayoutControl.setContentMinHeight(u)
				}
			})
		}
	}, Dashboard.InnerNavigator = {
		init: function(a, e) {
			var n = $(e);
			n.length > 0 && (n.addClass("active"), Dashboard.Sidebar.expandMenuToCurrentLink());
			var t = $(a),
				i = t.find("> li"),
				r = t.find(".active");
			i.find("ul").show().each(function() {
				$(this).data("startHeight", this.scrollHeight).css("overflow", "hidden")
			}), r.parents("li").addClass("active expanded"), i.filter(":not(.expanded)").find("ul").hide(), i.on("click", function() {
				var a = $(this);
				if (!a.hasClass("expanded")) {
					var e = a.find("ul");
					i.find("ul").not(e).each(function() {
						var a = $(this);
						a.velocity({
							height: [0]
						}, {
							duration: Dashboard.Settings.SidebarMenuAnimationDuration,
							easing: Dashboard.Settings.SidebarMenuAnimationEasing,
							complete: function() {
								a.closest("li").removeClass("expanded"), a.css("display", "none")
							}
						})
					}), e.css("display", "block"), e.velocity({
						height: [e.data("startHeight"), 0]
					}, {
						duration: Dashboard.Settings.SidebarMenuAnimationDuration,
						easing: Dashboard.Settings.SidebarMenuAnimationEasing,
						complete: function() {
							a.addClass("expanded")
						}
					})
				}
			})
		}
	}
}(),
function() {
	window.Dashboard = window.Dashboard || {}, Dashboard.RightSidebar = {
		setupVerticalScrolls: function() {
			function a(a) {
				var e = a.offset(),
					n = $(window).scrollTop(),
					t = a.nextAll().filter(function() {
						var a = $(this).css("position");
						return !("absolute" === a || "fixed" === a)
					}),
					i = Dashboard.Helpers.calcElementsHeightSum(t);
				a.css({
					height: window.innerHeight - (e.top - n) - i + "px"
				})
			}
			var e = $(".vertical-scroll-container"),
				n = $(".right-sidebar");
			e.each(function() {
				var e = $(this),
					t = n.add(e.closest(".tab-pane")).add(e.closest(".right-sidebar-extra-content"));
				Dashboard.Helpers.setAttributeChangeObserver(t, function() {
					a(e)
				}), $(window).on("resize ready", function() {
					a(e), e.perfectScrollbar("update")
				}), e.perfectScrollbar({
					suppressScrollX: !0
				})
			})
		},
		setupExtraContent: function() {
			function a(a, t) {
				var i = a.position().top,
					r = n.offset().top - e.scrollTop();
				t.css({
					top: i + "px",
					height: window.innerHeight - i - r + "px"
				})
			}
			var e = $(window),
				n = $(".right-sidebar");
			$("[data-target-extra-content]").each(function() {
				var t = $(this),
					i = $("#" + t.data("targetExtraContent")),
					r = n.add(i.closest(".tab-pane"));
				Dashboard.Helpers.setAttributeChangeObserver(r, function() {
					a(t, i)
				}), e.on("resize ready", function() {
					a(t, i)
				})
			}), $(".extra-content-close").on("click", function() {
				$(this).closest(".right-sidebar-extra-content").removeClass("active")
			}), $(".extra-content-open").on("click", function() {
				var a = $(this).closest("[data-target-extra-content]").data("targetExtraContent");
				a && $("#" + a).addClass("active")
			})
		}
	}
}(), $(function() {
		function a(a, e) {
			var n = function(a, e) {
					var n = {};
					return Object.getOwnPropertyNames(a).forEach(function(t) {
						n[t] = a[t].replace(/{brand}/g, e)
					}), n
				},
				t = d[a];
			return t ? n(t, e) : n(d.dark)
		}

		function e(a, e) {
			var n = l[a] || l.dark;
			return n.replace(/{brand}/g, e)
		}

		function n() {
			var a = b.attr("class") ? b.attr("class").split(" ") : [];
			return a.map(function(a) {
				return "loading" === a ? "" : a
			})
		}

		function t(a, e) {
			e = "undefined" == typeof e || e, a.find("input:not(.group-switch), select").prop("disabled", e)
		}

		function i(a, e) {
			var n = a.data("targetBodyClass"),
				t = a.data("direction") || "enabled";
			n && ("enabled" == t && (e ? b.addClass(n) : b.removeClass(n)), "disabled" == t && (e ? b.removeClass(n) : b.addClass(n)))
		}

		function r() {
			c.find("input, select").each(function() {
				var a = $(this),
					e = a.data("targetBodyClass"),
					n = a.data("direction");
				e && ("enabled" == n && a.prop("checked", h.indexOf(e) >= 0).trigger("change", !0), "disabled" == n && a.prop("checked", h.indexOf(e) < 0).trigger("change", !0)), a.trigger("load-handler")
			})
		}

		function o() {
			$(window).trigger("layout-options-changed")
		}

		function s() {
			var a = new MutationObserver(function(a) {
				a.forEach(function(a) {
					$(a.target).trigger("disabled-state-changed")
				})
			});
			c.find("input:not(.group-switch), select").each(function() {
				a.observe(this, {
					attributes: !0,
					attributeFilter: ["disabled"]
				})
			})
		}
		var d = {
				dark: {
					slim: "logo-slim-{brand}@2X.png",
					big: "logo-big-{brand}-white@2X.png",
					overlay: "logo-{brand}-white@2X.png"
				},
				light: {
					slim: "logo-slim-{brand}@2X.png",
					big: "logo-big-{brand}-black@2X.png",
					overlay: "logo-{brand}-black@2X.png"
				},
				color: {
					slim: "logo-slim-{brand}@2X.png",
					big: "logo-big-{brand}-black@2X.png",
					overlay: "logo-{brand}-white@2X.png"
				}
			},
			l = {
				dark: "logo-{brand}-white@2X.png",
				"default": "logo-{brand}-black@2X.png",
				color: "logo-{brand}-white@2X.png"
			};
		window.Dashboard = window.Dashboard || {};
		var c = $(".layout-options"),
			b = $("body"),
			u = c.find('input[type="checkbox"]'),
			h = n(),
			f = h.join(" "),
			g = $(".main-wrap > .content > *:not(.sub-navbar)").hasClass("container-fluid") ? "container-fluid" : "container",
			v = $(".main-wrap > .sub-navbar > *").hasClass("container-fluid") ? "container-fluid" : "container",
			p = $(".main-wrap > .navigation > .navbar > *").hasClass("container-fluid") ? "container-fluid" : "container",
			m = $(".main-wrap .navigation > .navbar").attr("class") || "";
		u.on("change", function() {
			var a = $(this),
				e = a.hasClass("group-switch"),
				n = a.is(":checked");
			if (e) {
				var r = a.closest(".input-group");
				t(r, !n)
			}
			i(a, n), o()
		}), u.on("disabled-state-changed", function() {
			var a = $(this);
			a.is(":disabled") ? i(a, !1) : i(a, a.is(":checked"))
		}), c.find(".action-reset-layout-options").on("click", function() {
			b.prop("class", "").addClass(f), $(".main-wrap > .content > *:not(.sub-navbar)").removeClass("container container-fluid").addClass(g), $(".main-wrap > .content > .sub-navbar > *").removeClass("container container-fluid").addClass(v), $(".main-wrap > .navigation > .navbar > *").removeClass("container container-fluid").addClass(p), $(".main-wrap > .navigation .navbar").removeClass("navbar-default navbar-inverse navbar-primary navbar-success navbar-info navbar-warning navbar-danger").addClass(m), r(), o()
		}), $(".navbar #sidebar-switch").on("click", function() {
			c.find("#layout-sidebar-style").trigger("load-handler")
		}), c.find("#layout-sidebar-enabled").on("change", function(a, e) {
			e || c.find("#layout-content-view").trigger("change")
		}), c.find("#layout-sidebar-style").on("load-handler", function() {
			var a = "",
				e = n();
			$(this).find("option").each(function() {
				var n = this.value.split(" "),
					t = 0;
				n.forEach(function(a) {
					e.indexOf(a) >= 0 && t++
				}), n && t === n.length && (a = this.value)
			}), $(this).val(a)
		}).on("change", function() {
			$(this).find("option").each(function() {
				b.removeClass(this.value)
			}), b.addClass(this.value), o()
		}).on("disabled-state-changed", function() {
			$(this).is(":disabled") ? $(this).find("option").each(function() {
				b.removeClass(this.value)
			}) : $(this).trigger("change")
		}), c.find("#layout-content-view").on("load-handler", function() {
			Dashboard.Helpers.isBoxedLayout() ? $(this).val("boxed-layout") : $(".main-wrap > .content > *:not(.sub-navbar)").hasClass("container") ? $(this).val("container") : $(this).val("container-fluid")
		}).on("change", function() {
			"boxed-layout" === this.value ? (b.addClass("boxed-layout"), $(".main-wrap > footer > *, .navbar > *, .main-wrap > .content > *:not(.sub-navbar)").removeClass("container container-fluid").addClass("container-fluid")) : (b.removeClass("boxed-layout"), Dashboard.Helpers.isSidebarDisabled() ? $(".main-wrap > footer > *, .navbar > *").removeClass("container container-fluid").addClass(this.value) : $(".main-wrap > footer > *, .navbar > *").removeClass("container container-fluid").addClass("container-fluid"), $(".main-wrap > .content > *:not(.sub-navbar), .main-wrap > .content > .sub-navbar > *").removeClass("container container-fluid").addClass(this.value)), o()
		}), c.find("#layout-subnavbar-style").on("load-handler", function() {
			var a = $(this),
				e = a.children("option");
			e.each(function() {
				var e = $(this).prop("value");
				b.hasClass(e) && a.val(e)
			})
		}).on("change", function() {
			var a = $(this).val();
			b.removeClass("sub-navbar-header-only"), b.addClass(a), $("#layout-subnavbar-fluid").prop("disabled", "sub-navbar-header-only" === a), o()
		});
		var y = "sidebar-dark-primary sidebar-dark-info sidebar-dark-success sidebar-dark-warning sidebar-dark-danger sidebar-light-primary sidebar-light-info sidebar-light-success sidebar-light-warning sidebar-light-danger sidebar-primary sidebar-info sidebar-success sidebar-warning sidebar-danger",
			C = "navbar-inverse navbar-default navbar-primary navbar-success navbar-info navbar-warning navbar-danger",
			S = function(n, t, i) {
				var r = ASSET_PATH_BASE + "/assets/images/";
				$(".navigation > .navbar .navbar-brand img").prop("src", r + e(t, i));
				var o = a(n, i);
				$(".navigation .sidebar-logo > .logo-slim").prop("src", r + o.slim), $(".navigation .sidebar-logo > .logo-default").prop("src", r + o.big), $(".navigation .sidebar-overlay-head > img").prop("src", r + o.overlay)
			};
		c.find("[name=mainColor],[name=navbarStyle],[name=sidebarStyle]").on("change", function() {
			var a = $("[name=mainColor]:checked").val(),
				e = $("[name=navbarStyle]:checked").val(),
				n = $("[name=sidebarStyle]:checked").val(),
				t = "sidebar" + ("color" === n ? "-" + a : "-" + n + "-" + a),
				i = "navbar" + ("color" === e ? "-" + a : "-" + e);
			b.removeClass(y).addClass(t), $(".navigation > .navbar").removeClass(C).addClass(i), S(n, e, a)
		}).on("load-handler", function() {
			var a = function() {
				var a = function() {
					var a = !0;
					return h.forEach(function(e) {
						a && y.indexOf(e) > 0 && (a = !1)
					}), a
				}();
				return a ? h.concat(["sidebar-dark-primary"]) : h
			}();
			a.forEach(function(a) {
				if (a && y.indexOf(a) >= 0) {
					var e = a.split("-"),
						n = e[e.length - 1],
						t = ["dark", "light"].indexOf(e[1]) >= 0 ? e[1] : "color";
					c.find("[name=sidebarStyle][value=" + t + "]").prop("checked", !0), c.find("[name=mainColor][value=" + n + "]").prop("checked", !0)
				}
			}), $(".navigation .navbar").attr("class").split(" ").forEach(function(a) {
				if (a && "navbar" !== a && C.indexOf(a) >= 0) {
					var e = "color";
					if (["navbar-inverse", "navbar-default"].indexOf(a) >= 0) {
						var n = a.split("-");
						e = n[1]
					}
					c.find("[name=navbarStyle][value=" + e + "]").prop("checked", !0)
				}
			}), S($("[name=sidebarStyle]:checked").val(), $("[name=navbarStyle]:checked").val(), $("[name=mainColor]:checked").val())
		}), s(), r()
	}),
	function() {
		window.Dashboard = window.Dashboard || {}, Dashboard.LayoutControl.setContentMinHeight(), Dashboard.Sidebar.expandMenuToCurrentLink(), $(function() {
			var a = $(".sidebar .side-menu"),
				e = [];
			Dashboard.Sidebar.saveSidebarStartupClasses(), Dashboard.Sidebar.setupMenu(a), Dashboard.Sidebar.setSidebarState(), Dashboard.Sidebar.setMenuHandler(a), Dashboard.Sidebar.setMenuTooltips(a), Dashboard.Sidebar.setSideSubmenusMinHeight(), Dashboard.LayoutControl.setContentMinHeight(), Dashboard.RightSidebar.setupVerticalScrolls(), Dashboard.RightSidebar.setupExtraContent(), Dashboard.LayoutControl.initLayoutChangeEventEmitter(), Dashboard.LayoutControl.setSidebarsStickyness(), $(window).on("layout-changed", function() {
					Dashboard.Sidebar.setMenuTooltips(a), Dashboard.Sidebar.setSideSubmenusMinHeight(), Dashboard.Sidebar.expandMenuToCurrentLink(), Dashboard.LayoutControl.setContentMinHeight(), e.length || $(".highcharts-container").each(function() {
						var a = $(this).parent().highcharts();
						a && e.push(a)
					}), e.forEach(function(a) {
						a.reflow()
					})
				}), $(window).on("resize", function() {
					Dashboard.Sidebar.setSidebarState(), Dashboard.LayoutControl.setContentMinHeight()
				}), $(window).on("layout-options-changed", function() {
					Dashboard.Sidebar.saveSidebarStartupClasses()
				}), $("body").imagesLoaded(function() {
					Dashboard.LayoutControl.setContentMinHeight()
				}), $(".action-right-sidebar-toggle").on("click", function() {
					$(".right-sidebar,.action-right-sidebar-toggle").toggleClass("active")
				}), $("body").on("click touchstart", function(a) {
					var e = $(a.target),
						n = $("body");
					e.closest(".action-right-sidebar-toggle").length || n.hasClass("sidebar-overlay") && !e.closest(".right-sidebar").length && $(".right-sidebar,.action-right-sidebar-toggle").removeClass("active")
				}), $(".action-toggle-sidebar-slim").on("click", function() {
					var a = $("body");
					if (Dashboard.Helpers.isSidebarSlim()) {
						var e = a.data("primarySidebarStyle") || "";
						a.removeClass("sidebar-slim").addClass(e)
					} else {
						var e = a.hasClass("sidebar-big-icons") ? "sidebar-big-icons" : "";
						a.data("primarySidebarStyle", e).removeClass(e).addClass("sidebar-slim")
					}
				}), $(".action-sidebar-open").on("click", function() {
					Dashboard.Sidebar.openOverlay()
				}), $(".action-sidebar-close").on("click", function() {
					Dashboard.Sidebar.closeOverlay()
				}), $("body").on("click touchstart", function(a) {
					var e = $(a.target),
						n = $("body");
					e.closest(".action-sidebar-open").length || n.hasClass("sidebar-overlay__open") && !e.closest(".sidebar").length && Dashboard.Sidebar.closeOverlay()
				}), $("body").on("click touchstart", function(a) {
					var e = $(a.target),
						n = $("body");
					e.closest(".navbar-toggle[data-target=#navbar]").length || n.hasClass("sidebar-overlay") && !e.closest("#navbar").length && $("#navbar").collapse("hide")
				}), $(".action-toggle-layout-options").on("click", function() {
					$("body").hasClass("layout-options-disabled") || $(".layout-options").toggleClass("active")
				}), $("html").click(function(a) {
					$(".spin-search-box").removeClass("active")
				}), $(".spin-search-box").on("click", function(a) {
					a.stopPropagation()
				}), $(".spin-search-box > a").on("click", function() {
					return $(this).closest(".spin-search-box").toggleClass("active"), !1
				}), Dashboard.Helpers.elementExists("#highstock-right-sidebar", function() {
					Dashboard.InnerNavigator.init(this, "#sidebar-link-highstock")
				}), $(".action-toggle-sidebar-slim, .action-right-sidebar-toggle, .action-toggle-layout-options.disabled").tooltip({
					container: "body",
					trigger: "hover"
				}), $(".action-toggle-layout-options:not(.disabled)").tooltip({
					trigger: "hover"
				}), $("[data-radio-toggle=tab]").on("change", function() {
					var a = $(this).data("tabId"),
						e = $(".tab-pane" + a);
					e.hasClass("active") || (e.siblings().removeClass("active"), e.addClass("active"), e.hasClass("fade") && requestAnimationFrame(function() {
						e.siblings().removeClass("in"), e.addClass("in")
					}))
				}).filter(":checked").trigger("change"),
				function() {
					"undefined" != typeof Holder && (Holder.addTheme("folder", {
						bg: "#444444",
						fg: "#5a5a5a",
						font: "FontAwesome",
						size: 36,
						fontweight: "bold",
						text: String.fromCharCode(61716)
					}), Holder.addTheme("video", {
						bg: "#444444",
						fg: "#2d2d2d",
						font: "FontAwesome",
						size: 36,
						fontweight: "normal",
						text: String.fromCharCode(61764)
					}), Holder.addTheme("call", {
						bg: "#444444",
						fg: "#2d2d2d",
						font: "FontAwesome",
						size: 36,
						fontweight: "normal",
						text: String.fromCharCode(61501)
					}), Holder.addTheme("facebook", {
						bg: "#3A5C96",
						fg: "#FFFFFF",
						font: "FontAwesome",
						size: 36,
						fontweight: "normal",
						text: String.fromCharCode(61594)
					}), Holder.addTheme("image", {
						bg: "#444444",
						fg: "#2d2d2d",
						font: "FontAwesome",
						size: 36,
						fontweight: "normal",
						text: String.fromCharCode(61502)
					}), Holder.addTheme("video", {
						bg: "#444444",
						fg: "#2d2d2d",
						font: "FontAwesome",
						size: 26,
						fontweight: "normal",
						text: String.fromCharCode(61501)
					}), Holder.addTheme("text", {
						bg: "#444444",
						fg: "#ffffff"
					}))
				}(),
				function() {
					var a = new MobileDetect(window.navigator.userAgent);
					a.mobile() || "MacIntel" === navigator.platform || $(".custom-scrollbar").perfectScrollbar()
				}(),
				function() {
					function a() {
						n ? t.perfectScrollbar("update") : (t.perfectScrollbar({
							suppressScrollX: !0
						}), n = !0)
					}

					function e() {
						n && (t.perfectScrollbar("destroy"), n = !1)
					}
					var n = !1,
						t = $(".sidebar");
					$(window).on("layout-changed", function() {
						Dashboard.Helpers.isDefaultSidebar() ? a() : e()
					}), Dashboard.Helpers.isDefaultSidebar() && a()
				}(),
				function() {
					Dashboard.Helpers.elementExists('[data-toggle="tooltip"]', function() {
						$('[data-toggle="tooltip"]').tooltip()
					}), Dashboard.Helpers.elementExists('[data-toggle="popover"]', function() {
						$('[data-toggle="popover"]').popover()
					})
				}(), $(".action-navigate-back").on("click", function() {
					return window.history.back(), !1
				}),
				function() {
					$(".action-panel-collapse").on("click", function() {
						var a = $(this).closest(".collapsible-panel");
						a.toggleClass("collapsed")
					}), $(".action-panel-close").on("click", function() {
						var a = $(this).closest(".collapsible-panel");
						a.remove()
					})
				}(), $(".avatar-image").imagesLoaded().done(function(a) {
					a.elements.forEach(function(a) {
						$(a).addClass("loaded")
					})
				})
		})
	}();