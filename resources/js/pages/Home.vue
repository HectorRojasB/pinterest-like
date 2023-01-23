<script setup>
import Post from "../components/Post.vue";

const dummyData = [
    {
        title: "Lorem ipsum",
        description:
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
        likes: 12,
        image_url:
            "https://images.pexels.com/photos/14211812/pexels-photo-14211812.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
    },
    {
        title: "Lorem ipsum",
        description:
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
        likes: 34,
        image_url:
            "https://images.pexels.com/photos/12859988/pexels-photo-12859988.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
    },
    {
        title: "Lorem ipsum",
        description:
            "Lorem ipsum dsfdfdfsadfaslkdjfhlaksjdhfl jashdflk jhasd lkfjh asdlkfjh asldkjfh asdlkjfha sldkfjh asdkljfh asdlfkjhasd flkjh sit amet, consectetur adipiscing elit,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
        likes: 34,
        image_url:
            "https://images.pexels.com/photos/13855925/pexels-photo-13855925.jpeg",
    },
    {
        title: "Lorem ipsum",
        description:
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
        likes: 34,
        image_url:
            "https://images.pexels.com/photos/15173511/pexels-photo-15173511.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
    },
    {
        title: "Lorem ipsum",
        description:
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
        likes: 12,
        image_url:
            "https://images.pexels.com/photos/14749507/pexels-photo-14749507.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
    },
    {
        title: "Lorem ipsum",
        description:
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
        likes: 34,
        image_url:
            "https://images.unsplash.com/photo-1526666923127-b2970f64b422?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2072&q=80",
    },
    {
        title: "Lorem ipsum",
        description:
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
        likes: 12,
        image_url:
            "https://images.pexels.com/photos/14586378/pexels-photo-14586378.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
    },
    {
        title: "Lorem ipsum",
        description:
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
        likes: 34,
        image_url:
            "https://images.pexels.com/photos/14705131/pexels-photo-14705131.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
    },
    {
        title: "Lorem ipsum",
        description:
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
        likes: 12,
        image_url:
            "https://images.pexels.com/photos/15139464/pexels-photo-15139464.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
    },
    {
        title: "Lorem ipsum",
        description:
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
        likes: 34,
        image_url:
            "https://images.pexels.com/photos/14951951/pexels-photo-14951951.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
    },
];
</script>

<template>
    <div class="home">
        <div class="d-flex justify-content-between header">
            <div class="container d-flex justify-content-between">
                <h3>Pinterest-Like</h3>
                <div class="actions d-flex">
                    <div class="btn btn-secondary">❤️ Favorites</div>
                    <div class="btn btn-secondary">Upload</div>
                    <div class="btn btn-primary">Login</div>
                </div>
            </div>
        </div>
        <div class="container posts-container">
            <Post
                v-for="(post, index) in dummyData"
                :key="index"
                :title="post.title"
                :description="post.description"
                :likes="post.likes"
                :image_url="post.image_url"
            />
        </div>
    </div>
</template>
