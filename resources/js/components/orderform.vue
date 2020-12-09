<template>
    <div class="container" style="margin-bottom: 1.5em">
        <div class="container has-text-centered" style="padding-bottom: 1em">
            <a
                class="button is-link is-inverted"
                v-on:click="add"
                v-if="count < products.length"
            >
                <span class="icon is-small">
                    <i class="fas fa-plus"></i>
                </span>
                <span>Add a new product</span>
            </a>
            <a
                class="button is-danger is-inverted"
                v-on:click="remove"
                v-if="count > 0"
            >
                <span class="icon is-small">
                    <i class="fas fa-minus"></i>
                </span>
                <span>Remove</span>
            </a>
        </div>

        <div class="box" v-if="count > 0">
            <table class="table is-fullwidth">
                <thead class="has-text-centered">
                    <th>No.</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Amount</th>
                    <th>Sub Total</th>
                </thead>
                <tbody>
                    <tr v-for="i in count" :key="i">
                        <th class="has-text-right">{{ i }}.</th>
                        <td>
                            <div class="select is-fullwidth">
                                <select
                                    name="goods[]"
                                    v-model="selectedProducts[i - 1]"
                                >
                                    <option disabled>Select a product</option>
                                    <option
                                        v-for="product in products"
                                        :key="product.id"
                                        v-bind:value="product.id"
                                    >
                                        [{{ product.manufacturer }}] {{ product.model }}
                                    </option>
                                </select>
                            </div>
                        </td>
                        <td class="has-text-right">
                            {{ getPrice(i) }}
                            <span v-if="getPrice(i) != ''">$</span>
                        </td>
                        <td>
                            <div class="field is-horizontal">
                                <div class="field-body">
                                    <div class="field">
                                        <p class="control">
                                            <input
                                                class="input"
                                                name="amounts[]"
                                                type="number"
                                                placeholder="Amount"
                                                min="1"
                                                v-model="productAmounts[i - 1]"
                                                required
                                            />
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="has-text-right">
                            <b>
                                {{ getSubTotal(i) }}
                                <span v-if="getSubTotal(i) != ''">$</span>
                            </b>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="container has-text-right" v-if="getTotal() > 0">
            <p class="subtitle">
                <b>Total: {{ getTotal() }}$</b>
            </p>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        products: Array[Object]
    },
    data: function() {
        return {
            message: "Test 13",
            count: 0,
            selectedProducts: [],
            productAmounts: []
        };
    },
    methods: {
        add: function() {
            this.count++;
        },
        remove: function() {
            if (this.count > 0) {
                this.count--;
            }
        },
        getPrice(i) {
            let product = this.products.find(
                x => x.id == this.selectedProducts[i - 1]
            );
            return product == null ? "" : parseFloat(product?.price).toFixed(2);
        },
        getSubTotal(i) {
            let price = this.getPrice(i);
            let amount = parseInt(this.productAmounts[i - 1] ?? "0");
            if (price == "" || amount == 0) return "";

            let subTotal = price * amount;
            return Math.round(subTotal * 100) / 100;
        },
        getTotal() {
            var sum = 0.0;

            for (var i = 1; i <= this.count; i++) {
                let subTotal = this.getSubTotal(i);
                if (subTotal == "") continue;
                sum += subTotal;
            }

            return Math.round(sum * 100) / 100;
        }
    }
};
</script>
