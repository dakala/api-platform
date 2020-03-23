import React from 'react';
import { Route } from 'react-router-dom';
import { List, Create, Update, Show } from '../components/family/';

export default [
  <Route path="/families/create" component={Create} exact key="create" />,
  <Route path="/families/edit/:id" component={Update} exact key="update" />,
  <Route path="/families/show/:id" component={Show} exact key="show" />,
  <Route path="/families" component={List} exact strict key="list" />,
  <Route path="/families/:page" component={List} exact strict key="page" />
];
