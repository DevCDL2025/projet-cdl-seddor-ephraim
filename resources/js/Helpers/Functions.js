import axios from "axios";
import {appRoute} from "@/Helpers/Utils.js";

export function getTransferFee (amount, currency) {
    return axios({
        method: "POST",
        url: appRoute("async.get-transfer-fee"),
        data: {
            amount: amount,
            currency: currency
        }
    })
}

export function getShippingFee (weight, currency) {
    return axios({
        method: "POST",
        url: appRoute("async.get-shipping-fee"),
        data: {
            weight: weight,
            currency: currency
        }
    })
}

export function getExchangeRate (departure_currency, arrival_currency) {
    return axios({
        method: "POST",
        url: appRoute("async.get-exchange-rate"),
        data: {
            departure_currency: departure_currency,
            arrival_currency: arrival_currency
        }
    })
}

export function getCitiesByCountry (country) {
    return axios({
        method: "POST",
        url: appRoute("async.get-cities-by-country"),
        data: {
            country: country,
        }
    })
}
