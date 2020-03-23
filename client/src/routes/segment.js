import React from 'react';
import { Route } from 'react-router-dom';
import { List, Create, Update, Show } from '../components/segment/';

export default [
  <Route path="/segments/create" component={Create} exact key="create" />,
  <Route path="/segments/edit/:id" component={Update} exact key="update" />,
  <Route path="/segments/show/:id" component={Show} exact key="show" />,
  <Route path="/segments" component={List} exact strict key="list" />,
  <Route path="/segments/:page" component={List} exact strict key="page" />
];
