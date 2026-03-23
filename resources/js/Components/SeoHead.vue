<template>
    <Head :title="seoTitle">
        <meta v-if="seo.description" head-key="description" name="description" :content="seo.description" />
        <meta v-if="seo.keywords" head-key="keywords" name="keywords" :content="seo.keywords" />
        <meta v-if="seo.author" head-key="author" name="author" :content="seo.author" />
        <meta v-if="seo.robots" head-key="robots" name="robots" :content="seo.robots" />
        <meta v-if="seo.theme_color" head-key="theme-color" name="theme-color" :content="seo.theme_color" />
        <meta v-if="seo.type" head-key="og:type" property="og:type" :content="seo.type" />
        <meta v-if="seoTitle" head-key="og:title" property="og:title" :content="seoTitle" />
        <meta v-if="seo.description" head-key="og:description" property="og:description" :content="seo.description" />
        <meta v-if="seo.url" head-key="og:url" property="og:url" :content="seo.url" />
        <meta v-if="seo.image" head-key="og:image" property="og:image" :content="seo.image" />
        <meta v-if="seo.site_name" head-key="og:site_name" property="og:site_name" :content="seo.site_name" />
        <meta v-if="seo.locale" head-key="og:locale" property="og:locale" :content="seo.locale" />
        <meta head-key="twitter:card" name="twitter:card" :content="twitterCard" />
        <meta v-if="seoTitle" head-key="twitter:title" name="twitter:title" :content="seoTitle" />
        <meta v-if="seo.description" head-key="twitter:description" name="twitter:description" :content="seo.description" />
        <meta v-if="seo.image" head-key="twitter:image" name="twitter:image" :content="seo.image" />
        <meta v-if="seo.twitter_site" head-key="twitter:site" name="twitter:site" :content="seo.twitter_site" />
        <meta v-if="seo.twitter_creator" head-key="twitter:creator" name="twitter:creator" :content="seo.twitter_creator" />
        <link v-if="seo.canonical" head-key="canonical" rel="canonical" :href="seo.canonical" />

        <meta
            v-for="(tag, index) in customMeta"
            :key="tag.key || tag.name || tag.property || tag.http_equiv || `custom-meta-${index}`"
            v-bind="buildMetaAttributes(tag)"
        />
    </Head>
</template>

<script setup>
import { computed } from 'vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps({
    seo: {
        type: Object,
        default: () => ({}),
    },
});

const seoTitle = computed(() => props.seo?.title || 'Portfolio');
const customMeta = computed(() => Array.isArray(props.seo?.custom_meta) ? props.seo.custom_meta : []);
const twitterCard = computed(() => props.seo?.image ? 'summary_large_image' : 'summary');

function buildMetaAttributes(tag) {
    const attributes = {};

    if (tag.charset) {
        attributes.charset = tag.charset;
    }

    if (tag.name) {
        attributes.name = tag.name;
    }

    if (tag.property) {
        attributes.property = tag.property;
    }

    if (tag.http_equiv) {
        attributes['http-equiv'] = tag.http_equiv;
    }

    if (tag.media) {
        attributes.media = tag.media;
    }

    if (tag.content) {
        attributes.content = tag.content;
    }

    return attributes;
}
</script>