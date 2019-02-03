const $ = require('jquery');

import TableManager from "../services/TableManager";
import NavNumberFormat from "../services/NavNumberFormat";
import moment from 'moment/src/moment';

class BlockIndexPage {
    constructor() {
        console.log("Block Index Page");

        this.tableManager = new TableManager('#block-list table', 'blocks', this.createTableRow);
    }

    createTableRow(data) {
        let numberFormatter = new NavNumberFormat();

        let $row = $(document.createElement('tr'));
        $row.attr('data-id', data.id);

        $row.append($(document.createElement('td'))
            .attr('data-role', 'height')
            .append('<a href="/block/'+data.height+'">'+data.height+'</a>')
        );

        $row.append($(document.createElement('td'))
            .attr('data-role', 'date/time')
            .append(moment(data.created).utc().format('YYYY-MM-DD[,] HH:mm:ss'))
        );

        $row.append($(document.createElement('td'))
            .attr('data-role', 'transactions')
            .addClass('text-center')
            .append(data.transactions)
        );

        let stakedBy = 'N/A';
        if (data.staked_by) {
            stakedBy = '<a href="/address/' + data.staked_by + '" class="break-word">' + data.staked_by + '</a>';
        } else if (data.stake !== 0) {
            stakedBy = '<em>Private Stake</em>';
        }

        $row.append($(document.createElement('td'))
            .attr('data-role', 'stakedBy')
            .append(stakedBy)
        );

        $row.append($(document.createElement('td'))
            .attr('data-role', 'stake')
            .addClass("text-right")
            .append(numberFormatter.formatNav(data.stake))
        );

        return $row;
    }
}


$(function() {
    if ($('body').is('.page-block-index')) {
        new BlockIndexPage();
    }
});