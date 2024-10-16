@if (Cart::instance('shopping')->count() > 0)
    @foreach (Cart::instance('shopping')->content() as $item)
        <tr class="product-list__item ">
            <td class="product-list__remove">
                <p class="remove action-cart" data-type="remove" data-id="{{ $item->rowId }}">x
                </p>
            </td>
            <td class="product-list__thumnail">
                <a href="{{ route('user.details-page', $item->options->slug) }}}">
                    <img loading="lazy" src="{{ showImageStorage($item->options->image) }}"
                        alt="ghe-massage-oreni-or-180i-4" width="70px" height="70px">
                </a>
            </td>
            <td class="product-list__name">
                <p class="flex-inline-center-left">
                    <a href="https://thanhloisport.com/ghe-massage-oreni-or-520-plus.html" class="flex-center-left">Ghế
                        massage Oreni OR-520 Plus</a>
                    <span class="badge flex-inline-center-left"></span>
                </p>
                <div class="product-list__description d-none">
                    <p class="product-list__price">{{ showPrice($item->price) }}</p>
                    <div class="product-list__quantity">
                        <div class="quantity">
                            <div class="quantity-button minus action-cart" data-type="sub"
                                data-id="{{ $item->rowId }}">
                            </div>
                            <input type="text" id="quantity" class="input-text qty text" value="{{ $item->qty }}"
                                title="Qty" size="4" min="0" max="" step="1"
                                placeholder="" inputmode="numeric" autocomplete="off">
                            <div class="quantity-button plus action-cart" data-type="add" data-id="{{ $item->rowId }}">
                            </div>
                        </div>
                    </div>
                    <p class="product-list__subtotal">
                    </p>
                    <p>{{ showPrice($item->price * $item->qty) }}</p>
                    <p></p>
                </div>
            </td>
            <td class="product-list__price">{{ showPrice($item->price) }}</td>
            <td class="product-list__quantity">
                <div class="quantity">
                    <div class="quantity-button minus action-cart" data-type="sub" data-id="{{ $item->rowId }}"></div>
                    <input type="text" id="quantity" class="input-text qty text" value="{{ $item->qty }}"
                        title="Qty" size="4" min="0" max="" step="1" placeholder=""
                        inputmode="numeric" autocomplete="off">
                    <div class="quantity-button plus action-cart" data-type="add" data-id="{{ $item->rowId }}"></div>
                </div>
            </td>
            <td class="product-list__subtotal">
                <p>{{ showPrice($item->price * $item->qty) }}</p>
            </td>
        </tr>
    @endforeach
@endif
