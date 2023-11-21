<template>
    <v-dialog v-model="dialog" max-width="700px">
        <v-card>
            <v-card-title class="text-h5">Related models for: #{{item.id}} {{item.name}} </v-card-title>
            <v-card-text>
                <v-card-item>
                    <p>Posts</p>
                    <v-data-table
                        :key="componentKey"
                        :items="posts"
                        :headers="headers"
                    >
                    </v-data-table>
                </v-card-item>
                <v-card-item>
                    <p>Cards</p>
                    <v-data-table
                        :key="componentKey"
                        :items="cards"
                        :headers="headers"
                    >
                    </v-data-table>
                </v-card-item>
            </v-card-text>
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="blue-darken-1" variant="text" @click="close">Cancel</v-btn>
                <v-spacer></v-spacer>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>

<script>
import axios from "axios";

export default {
    name: "ModalBannerRelated",
    data() {
        return {
            dialog: false,
            item: [],
            cards: [],
            posts: [],
            headers: [
                { title: 'Id', key: 'id' },
                { title: 'Name', key: 'name' },
                { title: 'Status', key: 'status' },
                { title: 'Created At', key: 'created_at' },
            ],
            componentKey: 0
        };
    },
    watch: {
        dialog (val) {
            val || this.close()
        }
    },
    methods: {
        close () {
            this.dialog = false;
        },

        getBanner(id){
            axios.get('api/banner/'+id).then(response => {
                this.cards = response.data.cards;
                this.posts = response.data.posts;
                this.componentKey += 1;
            });
        },

        openModal(item) {
            this.dialog = true;
            this.item = item;
            this.getBanner(item.id)
        }
    },
}
</script>
