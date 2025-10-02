<div class="sticky">
                <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
                <div class="app-sidebar">
                    <div class="side-header">
                        <a class="header-brand1" href="index.html">
                            <img src="{{asset('/')}}backend/assets/images/brand/logo.png" class="header-brand-img desktop-logo" alt="logo">
                            <img src="{{asset('/')}}backend/assets/images/brand/logo-1.png" class="header-brand-img toggle-logo" alt="logo">
                            <img src="{{asset('/')}}backend/assets/images/brand/logo-2.png" class="header-brand-img light-logo" alt="logo">
                            <img src="{{asset('/')}}backend/assets/images/brand/logo-3.png" class="header-brand-img light-logo1" alt="logo">
                        </a><!-- LOGO -->
                    </div>
                    <div class="main-sidemenu">
                        <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg"
                                fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                            </svg>
                        </div>
                        <ul class="side-menu">
                            <li>
                                <h3>Menu</h3>
                            </li>
							<li class="slide">
								<a class="side-menu__item has-link" data-bs-toggle="slide" href="index.html">
									<i class="side-menu__icon ion-stats-bars"></i>
									<span class="side-menu__label">Dashboard</span>
								</a>
							</li>
                            <li>
                                <h3>Product Section</h3>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="#">
                                    <i class="side-menu__icon ti-layers"></i>
                                    <span class="side-menu__label">Categories</span><i class="angle fa fa-angle-right"></i>
                                </a>
                                <ul class="slide-menu">
                                    <li><a href="{{ route('category.view') }}" class="slide-item">Manage Categories</a></li>
                                </ul>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="#">
                                    <i class="side-menu__icon ti-layers-alt"></i>
                                    <span class="side-menu__label">Sub Categories</span><i class="angle fa fa-angle-right"></i>
                                </a>
                                <ul class="slide-menu">
                                    <li><a href="{{ route('subCategory.view') }}" class="slide-item">Manage Sub Categories</a></li>
                                </ul>
                            </li>
                            <li>
                                <h3>Settings Module</h3>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="#">
                                    <i class="side-menu__icon pe-7s-paint-bucket"></i>
                                    <span class="side-menu__label">Colors</span><i class="angle fa fa-angle-right"></i>
                                </a>
                                <ul class="slide-menu">
                                    <li><a href="{{ route('color.view') }}" class="slide-item">Manage Colors</a></li>
                                </ul>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="#">
                                    <i class="side-menu__icon ti-ruler-alt"></i>
                                    <span class="side-menu__label">Sizes</span><i class="angle fa fa-angle-right"></i>
                                </a>
                                <ul class="slide-menu">
                                    <li><a href="{{ route('size.view') }}" class="slide-item">Manage Sizes</a></li>
                                </ul>
                            </li>
                            <li>
                                <h3>Web Apps</h3>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M21.5,13h-8.0005493C13.2234497,13.0001831,12.9998169,13.223999,13,13.5v8.0005493C13.0001831,21.7765503,13.223999,22.0001831,13.5,22h8.0006104C21.7765503,21.9998169,22.0001831,21.776001,22,21.5v-8.0006104C21.9998169,13.2234497,21.776001,12.9998169,21.5,13z M21,21h-7v-7h7V21z M10.5,2H2.4993896C2.2234497,2.0001831,1.9998169,2.223999,2,2.5v8.0005493C2.0001831,10.7765503,2.223999,11.0001831,2.5,11h8.0006104C10.7765503,10.9998169,11.0001831,10.776001,11,10.5V2.4993896C10.9998169,2.2234497,10.776001,1.9998169,10.5,2z M10,10H3V3h7V10z M10.5,13H2.4993896C2.2234497,13.0001831,1.9998169,13.223999,2,13.5v8.0005493C2.0001831,21.7765503,2.223999,22.0001831,2.5,22h8.0006104C10.7765503,21.9998169,11.0001831,21.776001,11,21.5v-8.0006104C10.9998169,13.2234497,10.776001,12.9998169,10.5,13z M10,21H3v-7h7V21z M21.5,2h-8.0005493C13.2234497,2.0001831,12.9998169,2.223999,13,2.5v8.0005493C13.0001831,10.7765503,13.223999,11.0001831,13.5,11h8.0006104C21.7765503,10.9998169,22.0001831,10.776001,22,10.5V2.4993896C21.9998169,2.2234497,21.776001,1.9998169,21.5,2z M21,10h-7V3h7V10z"/></svg>
                                    <span class="side-menu__label">Apps</span><i class="angle fa fa-angle-right"></i>
                                </a>
                                <ul class="slide-menu">
                                    <li class="side-menu-label1"><a href="javascript:void(0)">Apps</a></li>
                                    <li><a href="calendar2.html" class="slide-item">Calendar</a></li>
                                    <li><a href="chat.html" class="slide-item">Chat</a></li>
                                    <li class="sub-slide">
                                        <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="#"><span
                                                class="sub-side-menu__label">E-Commerce</span><i
                                                class="sub-angle fa fa-angle-right"></i></a>
                                        <ul class="sub-slide-menu">
                                            <li><a class="sub-slide-item" href="cart.html">Cart</a></li>
                                            <li><a class="sub-slide-item" href="checkout.html">Checkout</a></li>
                                            <li><a class="sub-slide-item" href="products.html">Products</a></li>
                                            <li><a class="sub-slide-item" href="product-details.html">Product-Details</a></li>
                                            <li><a class="sub-slide-item" href="wishlist.html">Wishlist</a></li>
                                        </ul>
                                    </li>
                                    <li class="sub-slide">
                                        <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="#"><span
                                                class="sub-side-menu__label">File Manager</span><i
                                                class="sub-angle fa fa-angle-right"></i></a>
                                        <ul class="sub-slide-menu">
                                            <li><a class="sub-slide-item" href="file-manager.html">Files</a></li>
                                            <li><a class="sub-slide-item" href="file-manager1.html">File Manager</a></li>
                                            <li><a class="sub-slide-item" href="file-manager2.html">File Details</a></li>
                                        </ul>
                                    </li>
                                    <li class="sub-slide">
                                        <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="#"><span
                                                class="sub-side-menu__label">E-Mail</span><i
                                                class="sub-angle fa fa-angle-right"></i></a>
                                        <ul class="sub-slide-menu">
                                            <li><a class="sub-slide-item" href="mail-inbox.html">Inbox</a></li>
                                            <li><a class="sub-slide-item" href="mail-compose.html">Compose Mail</a></li>
                                            <li><a class="sub-slide-item" href="mail-read.html">Read Mail</a></li>
                                            <li><a class="sub-slide-item" href="mail-settings.html">Mail Settings</a></li>
                                        </ul>
                                    </li>
                                    <li class="sub-slide">
                                        <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="#"><span
                                                class="sub-side-menu__label">Invoices</span><i
                                                class="sub-angle fa fa-angle-right"></i></a>
                                        <ul class="sub-slide-menu">
                                            <li><a class="sub-slide-item" href="invoice-list.html">Invoice List</a></li>
                                            <li><a class="sub-slide-item" href="invoice-details.html">Invoice Details</a></li>
                                            <li><a class="sub-slide-item" href="invoice-create.html">Create Invoice</a></li>
                                            <li><a class="sub-slide-item" href="invoice-timelog.html">Time Log Invoice</a></li>
                                            <li><a class="sub-slide-item" href="invoice-edit.html">Edit Invoice</a></li>
                                        </ul>
                                    </li>
                                    <li class="sub-slide">
                                        <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="#"><span
                                                class="sub-side-menu__label">Projects</span><i
                                                class="sub-angle fa fa-angle-right"></i></a>
                                        <ul class="sub-slide-menu">
                                            <li><a class="sub-slide-item" href="projects.html">Projects</a></li>
                                            <li><a class="sub-slide-item" href="projects-list.html">Projects List</a></li>
                                            <li><a class="sub-slide-item" href="project-details.html">Project Details</a></li>
                                            <li><a class="sub-slide-item" href="project-new.html">Project New</a></li>
                                            <li><a class="sub-slide-item" href="project-edit.html">Edit Project</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="ticket-details.html" class="slide-item"><span class="side-menu__label">Tickets</span></a></li>
                                    <li class="sub-slide">
                                        <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="#"><span
                                                class="sub-side-menu__label">Tasks</span><i
                                                class="sub-angle fa fa-angle-right"></i></a>
                                        <ul class="sub-slide-menu">
                                            <li><a class="sub-slide-item" href="tasks-list.html">Task List</a></li>
                                            <li><a class="sub-slide-item" href="task-edit.html">Edit Task</a></li>
                                            <li><a class="sub-slide-item" href="task-create.html">Create Task</a></li>
                                        </ul>
                                    </li>
                                    <li class="sub-slide">
                                        <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="#"><span
                                                class="sub-side-menu__label">Clients</span><i
                                                class="sub-angle fa fa-angle-right"></i></a>
                                        <ul class="sub-slide-menu">
                                            <li><a class="sub-slide-item" href="clients.html">Clients</a></li>
                                            <li><a class="sub-slide-item" href="client-create.html">Add Client</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M16.6766357,7.3233643C15.7435303,4.2431641,12.8848267,2,9.5,2C5.3578491,2,2,5.3578491,2,9.5c0,3.3848267,2.2431641,6.2435303,5.3233643,7.1766357C8.2564697,19.7568359,11.1151733,22,14.5,22c4.1402588-0.0045166,7.4954834-3.3597412,7.5-7.5C22,11.1151733,19.7568359,8.2564697,16.6766357,7.3233643z M16,9.5c0,0.8760376-0.1757202,1.7103882-0.4899292,2.4730225l-3.4830933-3.4830933C12.7896118,8.1757202,13.6239624,8,14.5,8c0.4649658,0.0005493,0.9176636,0.0518799,1.3549194,0.1450806C15.9481201,8.5823364,15.9994507,9.0350342,16,9.5z M15.0283203,12.906311c-0.5328369,0.862854-1.2597656,1.5897217-2.1226807,2.1224365l-3.9343872-3.9343872c0.5328369-0.8630981,1.2598877-1.5901489,2.1229858-2.1230469L15.0283203,12.906311z M7.0787354,15.5289917C4.6891479,14.5682983,3,12.2332764,3,9.5C3,5.9101562,5.9101562,3,9.5,3c2.7313232,0.0031738,5.06427,1.6907959,6.0264893,4.0783081C15.1900635,7.0321655,14.8491211,7,14.5,7C10.3578491,7,7,10.3578491,7,14.5C7,14.8500366,7.0323486,15.1917114,7.0787354,15.5289917z M8,14.5c0-0.8759766,0.1757812-1.7103271,0.4899292-2.4729614l3.4830322,3.4830322C11.2103271,15.8242188,10.3759766,16,9.5,16c-0.465332,0-0.918457-0.0509644-1.3560791-0.1439209C8.0509644,15.418457,8,14.965332,8,14.5z M14.5,21c-2.7332764,0-5.0682983-1.6891479-6.0289917-4.0787354C8.8082886,16.9676514,9.1499634,17,9.5,17c4.1402588-0.0045166,7.4954834-3.3597412,7.5-7.5c0-0.3491211-0.0321655-0.6900635-0.0783081-1.0264893C19.3092041,9.43573,20.9968262,11.7686768,21,14.5C21,18.0898438,18.0898438,21,14.5,21z"/></svg>
                                    <span class="side-menu__label">UI Elements</span><i class="angle fa fa-angle-right"></i>
                                </a>
                                <ul class="slide-menu">
                                    <li class="side-menu-label1"><a href="javascript:void(0)">UI Elements</a></li>
                                    <li><a href="alerts.html" class="slide-item">Alerts</a></li>
                                    <li><a href="avatar.html" class="slide-item">Avatar</a></li>
                                    <li><a href="badge.html" class="slide-item">Badges</a></li>
                                    <li><a href="breadcrumbs.html" class="slide-item">Breadcrumbs</a></li>
                                    <li><a href="buttons.html" class="slide-item">Buttons</a></li>
                                    <li><a href="colors.html" class="slide-item">Colors</a></li>
                                    <li><a href="dropdown.html" class="slide-item">Dropdown</a></li>
                                    <li><a href="gallery.html" class="slide-item">Gallery</a></li>
                                    <li><a href="loaders.html" class="slide-item">Loaders</a></li>
                                    <li><a href="navigation.html" class="slide-item">Navigation</a></li>
                                    <li><a href="notify.html" class="slide-item">Notifications</a></li>
                                    <li><a href="offcanvas.html" class="slide-item">Offcanvas</a></li>
                                    <li><a href="pagination.html" class="slide-item">Pagination</a></li>
                                    <li><a href="panels.html" class="slide-item">Panels</a></li>
                                    <li><a href="rangeslider.html" class="slide-item">Range Slider</a></li>
                                    <li><a href="scroll.html" class="slide-item">Scroll</a></li>
                                    <li><a href="tags.html" class="slide-item">Tags</a></li>
                                    <li><a href="thumbnails.html" class="slide-item">Thumbnails</a></li>
                                    <li><a href="treeview.html" class="slide-item">Treeview</a></li>
                                    <li><a href="typography.html" class="slide-item">Typography</a></li>
                                </ul>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M20.6601562,7c-0.767334-1.3284302-2.5855103-1.836853-4.8673706-1.5704346C14.8826904,3.3205566,13.5338745,2,12,2S9.1172485,3.3204956,8.2071533,5.4296265C5.9249268,5.1627808,4.1060181,5.6706543,3.3398438,7c-0.7667847,1.3283081-0.2972412,3.1570435,1.074585,5c-1.3718262,1.8429565-1.8413696,3.6716919-1.074646,5c0.6367188,1.1025391,1.9942017,1.6435547,3.7421875,1.6435547c0.3729858-0.0189819,0.7437134-0.0548096,1.112915-0.1002197C9.1050415,20.6685791,10.4594116,22,12,22s2.8949585-1.3314209,3.8051147-3.456665c0.3692017,0.0454102,0.7399292,0.0812378,1.112915,0.1002197c1.7469482,0,3.1063843-0.5410156,3.7421265-1.6435547c0.7667847-1.3283081,0.2972412-3.1570435-1.074585-5C20.9573975,10.1570435,21.4269409,8.3283081,20.6601562,7z M15.6480713,8.3894043C15.2786865,8.1427612,14.8995972,7.9006348,14.5,7.6699219c-0.3996582-0.230835-0.7990723-0.4382935-1.1974487-0.6350098c0.6378784-0.2148438,1.2570801-0.3780518,1.8477173-0.4918823C15.3469238,7.1115112,15.5151978,7.7294312,15.6480713,8.3894043z M12,3c1.0654297,0,2.0482178,0.9987793,2.7738037,2.5901489c-0.8824463,0.1806641-1.8171387,0.4703369-2.7739868,0.8580933C11.0432129,6.06073,10.1085815,5.7709351,9.2261353,5.59021C9.9517212,3.9987793,10.9345093,3,12,3z M8.8425293,6.5646973c0.6322021,0.1143799,1.2553101,0.2702026,1.866333,0.4645996C10.3067017,7.2276001,9.9035645,7.4368286,9.5,7.6699219C9.1004028,7.9006348,8.7213135,8.1427612,8.3519287,8.3894043C8.4831543,7.7377319,8.6489868,7.1273193,8.8425293,6.5646973z M4.2050781,7.5c0.6743774-0.8552856,1.7492065-1.2923584,2.8291016-1.1503906c0.2658691,0.0151367,0.5303345,0.0407715,0.7941895,0.0700073c-0.2806396,0.8480225-0.494751,1.7927856-0.6360474,2.8049927C6.3783569,9.859436,5.6602173,10.5241089,5.0626221,11.197998C4.0467529,9.7736816,3.6727905,8.4230347,4.2050781,7.5z M7.0488892,13.3538208C6.5440674,12.9088745,6.0932007,12.4544067,5.6994019,12c0.3937988-0.4544067,0.8446655-0.9089355,1.3494873-1.3538818C7.0200195,11.0892944,7,11.5386353,7,12S7.0200195,12.9107056,7.0488892,13.3538208z M4.2050781,16.5c-0.5322876-0.9230347-0.1583252-2.2736816,0.8575439-3.697998c0.5975952,0.6738892,1.3157349,1.338562,2.1296997,1.9733887c0.1427002,1.0221558,0.3591309,1.9763184,0.6437988,2.8307495C6.0949097,17.7734375,4.7382812,17.4219971,4.2050781,16.5z M8.3519287,15.6105957C8.7213135,15.8572388,9.1004028,16.0993652,9.5,16.3300781c0.3783569,0.2339478,0.7686157,0.4447021,1.1637573,0.6447144c-0.6261597,0.2092285-1.2341309,0.3692017-1.8143921,0.4810181C8.652832,16.8876953,8.4847412,16.2700806,8.3519287,15.6105957z M12,21c-1.0717163,0-2.0603027-1.0095215-2.7870483-2.6173096C10.1655884,18.2009888,11.0983276,17.9318848,12,17.5773926c0.9016113,0.3544922,1.8344116,0.6235962,2.7870483,0.8052979C14.0603027,19.9904785,13.0717163,21,12,21z M15.1503906,17.456543c-0.5805054-0.1118164-1.1887207-0.2718506-1.8151245-0.4812622C13.7307739,16.7751465,14.1212769,16.56427,14.5,16.3300781c0.3995972-0.2307129,0.7786865-0.4728394,1.1480713-0.7194824C15.5151978,16.2703857,15.3470459,16.8881836,15.1503906,17.456543z M15.8648682,14.2316284C15.2859497,14.6641235,14.6652832,15.0805054,14,15.4648438c-0.6655884,0.3839111-1.3366699,0.7131958-2.0007935,0.9981689C11.3355713,16.1780396,10.6650391,15.8487549,10,15.4648438c-0.6652832-0.3843384-1.2859497-0.8007202-1.8648682-1.2332153C8.0501099,13.5140381,8,12.7683105,8,12s0.0501099-1.5140381,0.1351318-2.2316284C8.7140503,9.3358765,9.3347168,8.9194946,10,8.5351562c0.6747437-0.3895264,1.3552246-0.7230835,2.0283813-1.0108032C12.7068481,7.8132324,13.3676758,8.1464844,14,8.5351562c0.6652832,0.3843384,1.2859497,0.8007202,1.8648682,1.2332153C15.9498901,10.4859619,16,11.2316895,16,12S15.9498901,13.5140381,15.8648682,14.2316284z M19.7949219,7.5c0.5322876,0.9230347,0.1583252,2.2736816-0.8575439,3.697998c-0.5975952-0.6738892-1.3157349-1.338562-2.1296997-1.9733887c-0.1427612-1.022644-0.359314-1.9771729-0.644165-2.8319092C17.90448,6.2254639,19.2612915,6.5772095,19.7949219,7.5z M16.9511108,10.6461182C17.4559326,11.0910645,17.9067993,11.5455933,18.3005981,12c-0.3937988,0.4544067-0.8446655,0.9088745-1.3494873,1.3538208C16.9799805,12.9107056,17,12.4613647,17,12S16.9799805,11.0892944,16.9511108,10.6461182z M19.7949219,16.5c-0.5328369,0.9221191-1.8897095,1.2739868-3.6312866,1.1068115c0.28479-0.8546143,0.5013428-1.80896,0.644043-2.8314209c0.8139648-0.6348267,1.5321045-1.2994995,2.1296997-1.9733887C19.9532471,14.2263184,20.3272095,15.5769653,19.7949219,16.5z"/></svg>
                                    <span class="side-menu__label">Advanced UI</span><i class="angle fa fa-angle-right"></i>
                                </a>
                                <ul class="slide-menu">
                                    <li class="side-menu-label1"><a href="javascript:void(0)">Advanced UI</a></li>
                                    <li><a href="accordion.html" class="slide-item">Accordions</a></li>
                                    <li><a href="carousel.html" class="slide-item">Carousel</a></li>
                                    <li><a href="cards.html" class="slide-item">Cards</a></li>
                                    <li><a href="counters.html" class="slide-item">Counters</a></li>
                                    <li><a href="modal.html" class="slide-item">Modals</a></li>
                                    <li><a href="timeline.html" class="slide-item">Timeline</a></li>
                                    <li><a href="sweetalert.html" class="slide-item">Sweet-Alerts</a></li>
                                    <li><a href="rating.html" class="slide-item">Rating</a></li>
                                    <li><a href="mediaobject.html" class="slide-item">Media Object</a></li>
                                    <li><a href="tabs.html" class="slide-item">Tabs</a></li>
                                    <li><a href="tooltipandpopover.html" class="slide-item">Tooltip and Popover</a></li>
                                    <li><a href="progress.html" class="slide-item">Progress Bars</a></li>

                                    <li><a href="footers.html" class="slide-item">Footers</a></li>
                                    <li><a href="users-list.html" class="slide-item">Users List</a></li>
                                    <li><a href="file-attachments.html" class="slide-item">File Attachments</a></li>
                                </ul>
                            </li>
                            <li>
                                <h3>Pages</h3>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon"  enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M19.8535156,8.1464844l-6-6C13.7597656,2.0526733,13.6326294,2,13.5,2H7C5.3438721,2.0018311,4.0018311,3.3438721,4,5v14c0.0018311,1.6561279,1.3438721,2.9981689,3,3h10c1.6561279-0.0018311,2.9981689-1.3438721,3-3V8.5C20,8.3673706,19.9473267,8.2402344,19.8535156,8.1464844z M14,3.7069702L18.2930298,8H14V3.7069702z M19,19c-0.0014038,1.1040039-0.8959961,1.9985962-2,2H7c-1.1040039-0.0014038-1.9985962-0.8959961-2-2V5c0.0014038-1.1040039,0.8959961-1.9985962,2-2h6v5.5c0,0.0001831,0,0.0003662,0,0.0005493C13.0001831,8.7765503,13.223999,9.0001831,13.5,9H19V19z"/></svg>
                                    <span class="side-menu__label">Pages</span><i class="angle fa fa-angle-right"></i>
                                </a>
                                <ul class="slide-menu">
                                    <li class="side-menu-label1"><a href="javascript:void(0)">Pages</a></li>
                                    <li class="sub-slide">
                                        <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="#"><span
                                                class="sub-side-menu__label">Authentication</span><i
                                                class="sub-angle fa fa-angle-right"></i></a>
                                        <ul class="sub-slide-menu">
                                            <li><a class="sub-slide-item" href="login.html">Sign In</a></li>
                                            <li><a class="sub-slide-item" href="register.html">Sign Up</a></li>
                                            <li><a class="sub-slide-item" href="forgot-password.html">Forgot Password</a></li>
                                            <li><a class="sub-slide-item" href="lockscreen.html">Lockscreen</a></li>
                                            <li><a class="sub-slide-item" href="construction.html">UnderConstruction</a></li>
                                        </ul>
                                    </li>
                                    <li class="sub-slide">
                                        <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="#"><span
                                                class="sub-side-menu__label">Error Pages</span><i
                                                class="sub-angle fa fa-angle-right"></i></a>
                                        <ul class="sub-slide-menu">
                                            <li><a class="sub-slide-item" href="error404.html">404 Error</a></li>
                                            <li><a class="sub-slide-item" href="error500.html">500 Error</a></li>
                                            <li><a class="sub-slide-item" href="error501.html">501 Error</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="settings.html" class="slide-item">Settings</a></li>
                                    <li><a href="profile.html" class="slide-item">Profile</a></li>
                                    <li><a href="about.html" class="slide-item">About Company</a></li>
                                    <li><a href="services.html" class="slide-item">Services</a></li>
                                    <li><a href="switcher.html" class="slide-item">Switcher</a></li>
                                    <li><a href="terms.html" class="slide-item">Terms</a></li>
                                    <li><a href="faq.html" class="slide-item">Faq's</a></li>
                                    <li><a href="pricing.html" class="slide-item">Pricing</a></li>
                                    <li class="sub-slide">
                                        <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="#"><span
                                                class="sub-side-menu__label">Blog</span><i
                                                class="sub-angle fa fa-angle-right"></i></a>
                                        <ul class="sub-slide-menu">
                                            <li><a class="sub-slide-item" href="blog.html">Blog</a></li>
                                            <li><a class="sub-slide-item" href="blog-details.html">Blog Details</a></li>
                                            <li><a class="sub-slide-item" href="blog-edit.html">Edit Post</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M2.25,8.4521484l9.5,5.4804688C11.8259277,13.9767456,11.9121704,14,12,14s0.1740723-0.0232544,0.25-0.0673828l9.5-5.4804688c0.0759888-0.0438843,0.1390381-0.1069946,0.1829224-0.1829224C22.071106,8.0300293,21.9891968,7.7241211,21.75,7.5859375l-9.5-5.4755859c-0.1550903-0.0878906-0.3449097-0.0878906-0.5,0l-9.5,5.4755859C2.1740112,7.6298218,2.1109619,7.6929321,2.0670776,7.7688599C1.928894,8.0080566,2.0108032,8.3139648,2.25,8.4521484z M12,3.1210938l8.4990234,4.8984375L12,12.9228516L3.5009766,8.0195312L12,3.1210938z M21.2479858,15.5263672L12,20.9208984l-9.2481079-5.3945312c-0.2384033-0.1391602-0.5444336-0.0587158-0.6835938,0.1796875s-0.0587158,0.5444336,0.1796875,0.6835938l9.5,5.5419922C11.8244019,21.9765015,11.911377,22.0001221,12,22c0.088562,0.0001221,0.1755371-0.0234985,0.2518921-0.0683594l9.5-5.5419922c0.2384033-0.1391602,0.3188477-0.4451904,0.1796875-0.6835938S21.4863892,15.387207,21.2479858,15.5263672z M21.2479858,11.5263672L12,16.9208984l-9.2481079-5.3945312c-0.2384033-0.1391602-0.5444336-0.0587158-0.6835938,0.1796875s-0.0587158,0.5444336,0.1796875,0.6835938l9.5,5.5419922C11.8244019,17.9765015,11.911377,18.0001221,12,18c0.088562,0.0001221,0.1755371-0.0234985,0.2518921-0.0683594l9.5-5.5419922c0.2384033-0.1391602,0.3188477-0.4451904,0.1796875-0.6835938S21.4863892,11.387207,21.2479858,11.5263672z"/></svg>
                                    <span class="side-menu__label">Utilities</span><i class="angle fa fa-angle-right"></i></a>
                                <ul class="slide-menu">
                                    <li class="side-menu-label1"><a href="javascript:void(0)">Utilities</a></li>
                                    <li><a href="background.html" class="slide-item">Background</a></li>
                                    <li><a href="border.html" class="slide-item">Border</a></li>
                                    <li><a href="display.html" class="slide-item">Display</a></li>
                                    <li><a href="flex.html" class="slide-item">Flex</a></li>
                                    <li><a href="height.html" class="slide-item">Height</a></li>
                                    <li><a href="margin.html" class="slide-item">Margin</a></li>
                                    <li><a href="padding.html" class="slide-item">Padding</a></li>
                                    <li><a href="position.html" class="slide-item">Position</a></li>
                                    <li><a href="width.html" class="slide-item">Width</a></li>
                                    <li><a href="opacity.html" class="slide-item">Opacity</a></li>
                                    <li><a href="emptypage.html" class="slide-item">Empty Page</a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                                width="24" height="24" viewBox="0 0 24 24">
                                <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>