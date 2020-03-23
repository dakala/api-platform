import React from 'react';
import { Route } from 'react-router-dom';
import { List, Create, Update, Show } from '../components/commodity/';

export default [
  <Route path="/commodities/create" component={Create} exact key="create" />,
  <Route path="/commodities/edit/:id" component={Update} exact key="update" />,
  <Route path="/commodities/show/:id" component={Show} exact key="show" />,
  <Route path="/commodities" component={List} exact strict key="list" />,
  <Route path="/commodities/:page" component={List} exact strict key="page" />
];
