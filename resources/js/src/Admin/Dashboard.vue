<template>
    <v-container>
        <v-card>
            <v-card-title>Banners</v-card-title>
            <v-card-text>
                <v-data-table
                    :key="componentKey"
                    :items="banners"
                    :headers="headers">
                    <template v-slot:item.actions="{ item }">
                        <v-icon
                            size="small"
                            class="me-2"
                            @click="showRelated(item)"
                        >
                            mdi-link
                        </v-icon>
                    </template>
                </v-data-table>
               <ModalBannerRelated ref="modal" />
            </v-card-text>
        </v-card>
    </v-container>
</template>

<script>
import {defineComponent} from "vue";
import axios from "axios";
import ModalBannerRelated from "@/src/Admin/Widgets/ModalBannerRelated.vue";

export default {
    components: {
        ModalBannerRelated
    },
    methods: {
        getBanners(){
            axios.get('api/banners').then(response => {
                this.banners = response.data.banners;
                this.componentKey += 1;
            });
        },
        showRelated(item){
            this.$refs.modal.openModal(item);
        },
    },
    data() {
        return {
            banners: [],
            headers: [
                { title: 'Name', key: 'name' },
                { title: 'Text', key: 'text' },
                { title: 'URL', key: 'url' },
                { title: 'Created At', key: 'created_at' },
                { title: 'Actions', key: 'actions', sortable: false },
            ],
            componentKey: 0,
            dialog: false,
            item: {}
        };
    },
    mounted() {
       this.getBanners();
    }
};
</script>
