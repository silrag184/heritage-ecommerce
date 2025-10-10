// Shopping Cart JavaScript
$(document).ready(function() {
    
    // CSRF token setup for AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Update cart count on page load
    updateCartCount();

    // Add to Cart functionality
    $(document).on('submit', '.add-to-cart-form', function(e) {
        e.preventDefault();
        
        const form = $(this);
        const formData = form.serialize();
        
        $.ajax({
            url: '/add-to-cart',
            method: 'POST',
            data: formData,
            success: function(response) {
                if (response.success) {
                    // Show success message
                    showNotification('success', response.message);
                    
                    // Update cart count
                    updateCartCount();
                    
                    // Refresh cart modal content
                    loadCartItems();
                    
                    // Show cart modal
                    $('#shoppingCart').modal('show');
                }
            },
            error: function(xhr) {
                showNotification('error', 'Failed to add item to cart');
                console.error(xhr.responseText);
            }
        });
    });

    // Increase quantity
    $(document).on('click', '.tf-mini-cart-item .plus-btn', function() {
        const cartItem = $(this).closest('.tf-mini-cart-item');
        const input = cartItem.find('input[name="number"]');
        const currentQty = parseInt(input.val());
        const newQty = currentQty + 1;
        
        input.val(newQty);
        updateCartQuantity(cartItem, newQty);
    });

    // Decrease quantity
    $(document).on('click', '.tf-mini-cart-item .minus-btn', function() {
        const cartItem = $(this).closest('.tf-mini-cart-item');
        const input = cartItem.find('input[name="number"]');
        const currentQty = parseInt(input.val());
        
        if (currentQty > 1) {
            const newQty = currentQty - 1;
            input.val(newQty);
            updateCartQuantity(cartItem, newQty);
        }
    });

    // Manual quantity input change
    $(document).on('change', '.tf-mini-cart-item input[name="number"]', function() {
        const cartItem = $(this).closest('.tf-mini-cart-item');
        let newQty = parseInt($(this).val());
        
        if (isNaN(newQty) || newQty < 1) {
            newQty = 1;
            $(this).val(1);
        }
        
        updateCartQuantity(cartItem, newQty);
    });

    // Remove item from cart
    $(document).on('click', '.tf-mini-cart-remove', function() {
        const cartItem = $(this).closest('.tf-mini-cart-item');
        const cartKey = cartItem.data('key');
        
        $.ajax({
            url: '/remove-from-cart',
            method: 'POST',
            data: { cart_key: cartKey },
            success: function(response) {
                if (response.success) {
                    showNotification('success', 'Item removed from cart');
                    
                    // Remove item from DOM
                    cartItem.fadeOut(300, function() {
                        $(this).remove();
                        
                        // Check if cart is empty
                        if ($('.tf-mini-cart-item').length === 0) {
                            $('.tf-mini-cart-items').html('<p>Your cart is empty.</p>');
                            $('.tf-mini-cart-bottom').hide();
                        }
                        
                        // Update totals
                        updateCartTotals();
                        updateCartCount();
                    });
                }
            },
            error: function(xhr) {
                showNotification('error', 'Failed to remove item');
                console.error(xhr.responseText);
            }
        });
    });

    // Update cart quantity via AJAX
    function updateCartQuantity(cartItem, quantity) {
        const cartKey = cartItem.data('key');
        
        $.ajax({
            url: '/update-cart',
            method: 'POST',
            data: { 
                cart_key: cartKey,
                quantity: quantity
            },
            success: function(response) {
                if (response.success) {
                    // Update totals
                    updateCartTotals();
                    updateCartCount();
                }
            },
            error: function(xhr) {
                showNotification('error', 'Failed to update quantity');
                console.error(xhr.responseText);
            }
        });
    }

    // Load cart items
    function loadCartItems() {
        $.ajax({
            url: '/get-cart',
            method: 'GET',
            success: function(response) {
                if (response.items.length > 0) {
                    renderCartItems(response.items, response.total);
                    $('.tf-mini-cart-bottom').show();
                } else {
                    $('.tf-mini-cart-items').html('<p>Your cart is empty.</p>');
                    $('.tf-mini-cart-bottom').hide();
                }
            },
            error: function(xhr) {
                console.error('Failed to load cart items', xhr.responseText);
            }
        });
    }

    // Render cart items in modal
    function renderCartItems(items, total) {
        let html = '';
        
        items.forEach(function(item) {
            const cartKey = item.product_id + '-' + item.color_id + '-' + item.size_id;
            
            html += `
                <div class="tf-mini-cart-item" data-key="${cartKey}">
                    <div class="tf-mini-cart-image">
                        <a href="/product/${item.product_id}">
                            <img src="/${item.image_path}" alt="${item.product_name}">
                        </a>
                    </div>
                    <div class="tf-mini-cart-info">
                        <a class="title link" href="/product/${item.product_id}">${item.product_name}</a>
                        <div class="meta-variant">${item.color_name}, ${item.size_name}</div>
                        <div class="price fw-6">&#2547;${item.selling_price}</div>
                        <div class="tf-mini-cart-btns">
                            <div class="wg-quantity small">
                                <span class="btn-quantity minus-btn">-</span>
                                <input type="text" name="number" value="${item.quantity}">
                                <span class="btn-quantity plus-btn">+</span>
                            </div>
                            <div class="tf-mini-cart-remove">Remove</div>
                        </div>
                    </div>
                </div>
            `;
        });
        
        $('.tf-mini-cart-items').html(html);
        $('.tf-totals-total-value').text('৳' + total);
        updateProgressBar(total);
    }

    // Update cart totals
    function updateCartTotals() {
        $.ajax({
            url: '/get-cart',
            method: 'GET',
            success: function(response) {
                $('.tf-totals-total-value').text('৳' + response.total);
                updateProgressBar(response.total);
            }
        });
    }

    // Update cart count badge
    function updateCartCount() {
        $.ajax({
            url: '/get-cart',
            method: 'GET',
            success: function(response) {
                $('.count-box').text(response.count);
            }
        });
    }

    // Update progress bar for free shipping
    function updateProgressBar(total) {
        const freeShippingThreshold = 75;
        const percentage = Math.min((total / freeShippingThreshold) * 100, 100);
        
        $('.tf-progress-bar span').css('width', percentage + '%');
        
        if (total >= freeShippingThreshold) {
            $('.tf-progress-msg').html('You have <span class="fw-6">Free Shipping</span>!');
        } else {
            const remaining = freeShippingThreshold - total;
            $('.tf-progress-msg').html(`Buy <span class="price fw-6">$${remaining.toFixed(2)}</span> more to enjoy <span class="fw-6">Free Shipping</span>`);
        }
    }

    // Show notification
    function showNotification(type, message) {
        // You can use any notification library here
        // For now, using a simple alert
        if (type === 'success') {
            // If you have a toast/notification system, use it here
            alert(message);
        } else {
            alert(message);
        }
    }

    // Load cart items when modal is opened
    $('#shoppingCart').on('show.bs.modal', function() {
        loadCartItems();
    });

    // Full cart page functionality

    // Increase quantity in full cart
    $(document).on('click', '.btnincrease', function() {
        const input = $(this).siblings('input[name="number"]');
        const currentQty = parseInt(input.val());
        const newQty = currentQty + 1;
        input.val(newQty);
        const cartKey = input.data('cart-key');
        updateCartQuantityByKey(cartKey, newQty);
    });

    // Decrease quantity in full cart
    $(document).on('click', '.btndecrease', function() {
        const input = $(this).siblings('input[name="number"]');
        const currentQty = parseInt(input.val());
        if (currentQty > 1) {
            const newQty = currentQty - 1;
            input.val(newQty);
            const cartKey = input.data('cart-key');
            updateCartQuantityByKey(cartKey, newQty);
        }
    });

    // Manual quantity input change in full cart
    $(document).on('change', '.tf-cart-item input[name="number"]', function() {
        let newQty = parseInt($(this).val());
        if (isNaN(newQty) || newQty < 1) {
            newQty = 1;
            $(this).val(1);
        }
        const cartKey = $(this).data('cart-key');
        updateCartQuantityByKey(cartKey, newQty);
    });

    // Remove item from full cart
    $(document).on('click', '.remove-cart', function() {
        const cartKey = $(this).data('cart-key');
        removeFromCart(cartKey);
    });

    // Function to update quantity by key
    function updateCartQuantityByKey(cartKey, quantity) {
        $.ajax({
            url: '/update-cart',
            method: 'POST',
            data: { cart_key: cartKey, quantity: quantity },
            success: function(response) {
                if (response.success) {
                    location.reload(); // Reload to update totals and progress
                }
            },
            error: function(xhr) {
                showNotification('error', 'Failed to update quantity');
            }
        });
    }

    // Function to remove from cart
    function removeFromCart(cartKey) {
        $.ajax({
            url: '/remove-from-cart',
            method: 'POST',
            data: { cart_key: cartKey },
            success: function(response) {
                if (response.success) {
                    location.reload(); // Reload to update the cart list
                }
            },
            error: function(xhr) {
                showNotification('error', 'Failed to remove item');
            }
        });
    }
});
