export interface CountryListItem {
    name: {
        common: String,
    }
    population: Number,
    flag: String,
    capital: String,

}

export interface Country {
    name: {
        common: String,
        official: String,
    }
    population: Number,
    flag: String,
    capital: String[],
    maps: {
        googleMaps: String
    }


}
