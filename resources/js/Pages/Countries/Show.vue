<script setup lang="ts">
import type {Country} from "@/types";
import {computed} from "vue";

interface Props {
    country: Country
}
const props = defineProps<Props>()

const country = computed(() => props.country)

</script>

<template>
    <div class="container mx-auto">
        <div class="my-10">
            <div class="bg-white mt-10 rounded-xl shadow-xl p-10">
                <a href="../" class="pb-2 inline-block underline hover:no-underline">&lt; Go back</a>
                <h2 class="text-xl font-bold mb-5">{{ country.name.official }}</h2>
                <div>
                    <span class="label">Official Name: </span>
                    <span class="value">{{ country.name.official }}</span>
                </div>
                <div>
                    <span class="label">Commong Name: </span>
                    <span class="value">{{ country.name.common }}</span>
                </div>
                <div>
                    <span class="label">Flag: </span>
                    <span class="value">{{ country.flag }}</span>
                </div>
                <div>
                    <span class="label">Capital(s): </span>
                    <span class="value">
                        <span v-if="country.capital" v-for="capital in country.capital">{{ capital }}</span>
                    </span>
                </div>
                <div>
                    <span class="label">Population: </span>
                    <span class="value">{{ country.population }}</span>
                </div>
                <div>
                    <span class="label">Google Maps: </span>
                    <span class="value"><a class="underline hover:no-underline" :href="country.maps.googleMaps" target="_blank">Open on Google Maps</a></span>
                </div>

                Blah blah...
            </div>
        </div>
    </div>
</template>


<style scoped>
.label {
    @apply font-bold;
}
</style>
