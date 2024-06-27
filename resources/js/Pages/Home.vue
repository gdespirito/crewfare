<script setup lang="ts">

import {computed} from "vue";

interface Country {
    name: {
        common: String,
        official: String,
    }
    population: Number
}

interface Props {
    countries: Country[]
}


const props = defineProps<Props>()

const countries = computed(() => props.countries)

console.log(props.countries);
</script>

<template>
    <div class="container mx-auto">
        <div class="my-10">
            <div class="bg-white mt-10 rounded-xl shadow-xl p-10">
                <h2 class="text-xl font-bold mb-5">Countries</h2>
                <div v-for="(country, index) in countries" class="mb-4">
                    <div class="flex">
                        <div class="mr-2 block">
                            <span class="mt-1 bg-lime-100 text-sm w-6 h-6 flex items-center justify-center rounded-full">{{ index + 1 }}</span>
                        </div>
                        <div>
                            <span class="font-bold">{{country.name.common }}</span>
                            <span class="block">Population: {{ country.population.toLocaleString() }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>
