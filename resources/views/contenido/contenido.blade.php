@extends('principal')
   @section('contenido')
   <template v-if="menu==0">
      <h1>C0</h1>
   </template>

   <template v-if="menu==1">
      <emocion></emocion>
   </template>

   <template v-if="menu==2">
      <h1>C2</h1>
   </template>

   <template v-if="menu==3">
      <h1>C3</h1>
   </template>

   <template v-if="menu==4">
      <h1>C4</h1>
   </template>

   <template v-if="menu==5">
   <div class="container">
      <h1>C5</h1>
   </div>
   </template>

   <template v-if="menu==6">
      <h1>C6</h1>
   </template>

   <template v-if="menu==7">
      <h1>C7</h1>
   </template>

   <template v-if="menu==8">
      <h1>C8</h1>
   </template>

   <template v-if="menu==9">
      <h1>C9</h1>
   </template>

   <template v-if="menu==10">
      <h1>C10</h1>
   </template>
    @endsection