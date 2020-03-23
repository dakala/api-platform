import React from 'react';
import { Route } from 'react-router-dom';
import { List, Create, Update, Show } from '../components/classification/';

export default [
  <Route path="/classifications/create" component={Create} exact key="create" />,
  <Route path="/classifications/edit/:id" component={Update} exact key="update" />,
  <Route path="/classifications/show/:id" component={Show} exact key="show" />,
  <Route path="/classifications" component={List} exact strict key="list" />,
  <Route path="/classifications/:page" component={List} exact strict key="page" />
];
