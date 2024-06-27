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
    regions: string[],
    countries: Country[]
    currentRegion: string | null,
}


const props = defineProps<Props>()

const countries = computed<Country[]>(() => props.countries)
const regions = computed<String[]>(() => props.regions)
const currentRegion = computed<String|null>(() => props.currentRegion)

</script>

<template>
    <div class="container mx-auto">
        <div class="my-10">
            <div class="bg-white mt-10 rounded-xl shadow-xl p-10">
                <h2 class="text-xl font-bold mb-5">Countries</h2>
                <div class="flex -ml-2 my-2">

                    <div class="mx-2"><a :class="{
                            'font-bold': currentRegion === null
                        }" class="hover:underline" href="?">All</a></div>
                    <div v-for="region in regions" class="mx-2">
                        <a class="hover:underline" :class="{
                            'font-bold': currentRegion === region
                        }" :href="`?region=${region}`">{{ region }}</a>
                    </div>
                </div>
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
